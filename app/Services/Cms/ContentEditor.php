<?php

namespace App\Services\Cms;

use App\Models\PageSection;
use App\Models\SectionItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ContentEditor
{
    public function updateSection(PageSection $section, array $fields, array $input, int $userId): void
    {
        $removed = $this->fill($section, $fields, $input);
        $section->updated_by = $userId;
        $section->save();

        $this->deleteUploads($removed);
    }

    public function createItem(PageSection $section, ?SectionItem $parent, array $fields, array $input, int $userId): SectionItem
    {
        $item = new SectionItem;
        $item->page_section_id = $section->id;
        $item->parent_id = $parent?->id;
        $item->is_active = (bool) ($input['is_active'] ?? false);
        $item->sort_order = $this->nextSortOrder($section, $parent);
        $item->updated_by = $userId;

        $this->fill($item, $fields, $input);
        $item->save();

        return $item;
    }

    public function updateItem(SectionItem $item, array $fields, array $input, int $userId): void
    {
        $removed = $this->fill($item, $fields, $input);
        $item->is_active = (bool) ($input['is_active'] ?? false);
        $item->updated_by = $userId;
        $item->save();

        $this->deleteUploads($removed);
    }

    public function deleteItem(SectionItem $item): void
    {
        $item->load('children');
        $paths = $item->children->push($item)
            ->flatMap(fn (SectionItem $row) => [$row->image, ...array_values($row->meta ?? [])])
            ->all();

        $item->delete();

        $this->deleteUploads($paths);
    }

    /**
     * Swap the item with its neighbour in the given direction.
     */
    public function move(SectionItem $item, string $direction): void
    {
        DB::transaction(function () use ($item, $direction) {
            $siblings = SectionItem::where('page_section_id', $item->page_section_id)
                ->where('parent_id', $item->parent_id)
                ->orderBy('sort_order')->orderBy('id')
                ->lockForUpdate()
                ->get()
                ->values();

            $index = $siblings->search(fn (SectionItem $row) => $row->id === $item->id);
            $target = $direction === 'up' ? $index - 1 : $index + 1;

            if ($index === false || ! $siblings->has($target)) {
                return;
            }

            $ordered = $siblings->all();
            [$ordered[$index], $ordered[$target]] = [$ordered[$target], $ordered[$index]];

            foreach ($ordered as $position => $row) {
                if ($row->sort_order !== $position + 1) {
                    $row->sort_order = $position + 1;
                    $row->saveQuietly();
                }
            }
        });
    }

    /**
     * Copies submitted values onto the model. Returns upload paths that were
     * replaced or cleared, so the caller can delete them after saving.
     */
    private function fill(Model $model, array $fields, array $input): array
    {
        $replaced = [];

        foreach ($fields as $name => $field) {
            if (in_array($field['type'], ['image', 'file'], true)) {
                $current = $model->value($name);
                $upload = $input[$name] ?? null;

                if ($upload instanceof UploadedFile) {
                    $model->setValue($name, $this->store($upload));
                    $replaced[] = $current;
                } elseif (! empty($input['remove_'.$name])) {
                    $model->setValue($name, null);
                    $replaced[] = $current;
                }

                continue;
            }

            $value = $input[$name] ?? null;
            $model->setValue($name, $value === null ? null : trim($value));
        }

        return $replaced;
    }

    private function store(UploadedFile $file): string
    {
        $dir = config('cms.upload_dir').'/'.now()->format('Y/m');
        $name = Str::random(32).'.'.strtolower($file->guessExtension() ?: $file->getClientOriginalExtension());

        $file->move(base_path($dir), $name);

        return $dir.'/'.$name;
    }

    /**
     * Only files uploaded through the admin are deleted. Theme files that
     * shipped with the site (assets/ghrweb/..., assets/logo.png) are left alone.
     */
    private function deleteUploads(array $paths): void
    {
        $prefix = config('cms.upload_dir').'/';

        foreach ($paths as $path) {
            if (is_string($path) && str_starts_with($path, $prefix) && ! str_contains($path, '..')) {
                File::delete(base_path($path));
            }
        }
    }

    private function nextSortOrder(PageSection $section, ?SectionItem $parent): int
    {
        return (int) SectionItem::where('page_section_id', $section->id)
            ->where('parent_id', $parent?->id)
            ->max('sort_order') + 1;
    }
}
