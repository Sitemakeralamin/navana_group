<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Models\SectionItem;
use App\Services\Cms\ContentEditor;
use App\Services\Cms\ContentSchema;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItemController extends Controller
{
    public function __construct(
        private ContentSchema $schema,
        private ContentEditor $editor,
    ) {}

    public function create(Request $request, string $page, string $key): View
    {
        $section = $this->section($page, $key);
        $parent = $this->parentFromRequest($request, $section);

        return view('admin.items.form', [
            'section' => $section,
            'item' => new SectionItem(['is_active' => true]),
            'parent' => $parent,
            'definition' => $this->definition($page, $key, $parent !== null),
            'pageDefinition' => $this->schema->page($page),
            'sectionDefinition' => $this->schema->section($page, $key),
        ]);
    }

    public function store(Request $request, string $page, string $key): RedirectResponse
    {
        $section = $this->section($page, $key);
        $parent = $this->parentFromRequest($request, $section);
        $fields = $this->definition($page, $key, $parent !== null)['fields'];

        $input = $this->validated($request, $fields);
        $this->editor->createItem($section, $parent, $fields, $input, $request->user()->id);

        return redirect()
            ->route('admin.sections.edit', [$page, $key])
            ->with('status', 'Saved.');
    }

    public function edit(SectionItem $item): View
    {
        $section = $item->section;

        return view('admin.items.form', [
            'section' => $section,
            'item' => $item,
            'parent' => $item->parent,
            'definition' => $this->definition($section->page, $section->key, $item->parent_id !== null),
            'pageDefinition' => $this->schema->page($section->page),
            'sectionDefinition' => $this->schema->section($section->page, $section->key),
        ]);
    }

    public function update(Request $request, SectionItem $item): RedirectResponse
    {
        $section = $item->section;
        $fields = $this->definition($section->page, $section->key, $item->parent_id !== null)['fields'];

        $input = $this->validated($request, $fields);
        $this->editor->updateItem($item, $fields, $input, $request->user()->id);

        return redirect()
            ->route('admin.sections.edit', [$section->page, $section->key])
            ->with('status', 'Saved.');
    }

    public function destroy(SectionItem $item): RedirectResponse
    {
        $section = $item->section;
        $this->editor->deleteItem($item);

        return redirect()
            ->route('admin.sections.edit', [$section->page, $section->key])
            ->with('status', 'Deleted.');
    }

    public function move(SectionItem $item, string $direction): RedirectResponse
    {
        $this->editor->move($item, $direction);

        return back();
    }

    private function section(string $page, string $key): PageSection
    {
        $this->schema->section($page, $key);

        return PageSection::firstOrCreate(['page' => $page, 'key' => $key]);
    }

    private function definition(string $page, string $key, bool $nested): array
    {
        return $this->schema->itemDefinition($page, $key, $nested) ?? throw new NotFoundHttpException;
    }

    private function parentFromRequest(Request $request, PageSection $section): ?SectionItem
    {
        if (! $request->filled('parent')) {
            return null;
        }

        return SectionItem::where('page_section_id', $section->id)
            ->whereNull('parent_id')
            ->findOrFail($request->integer('parent'));
    }

    private function validated(Request $request, array $fields): array
    {
        return $request->validate(
            $this->schema->rules($fields) + ['is_active' => ['nullable', 'boolean']],
            [],
            $this->schema->attributes($fields)
        );
    }
}
