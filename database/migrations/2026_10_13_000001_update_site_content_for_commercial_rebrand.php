<?php

use App\Models\PageSection;
use App\Models\SectionItem;
use Database\Seeders\ContentSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Content changes for the October 2026 site update. The sister concern list is
 * replaced outright; every other change targets rows that still hold the old
 * seeded values, so hand edits made in the admin panel survive.
 */
return new class extends Migration
{
    private const TEXT_COLUMNS = ['title', 'subtitle', 'body'];

    // "Groups" as a word only: nanovagroups@gmail.com and nanovagroups.com stay intact.
    private const BRAND_PATTERN = '/(?<![\w.@\/\-])(GROUPS|GROUP|Groups|Group|groups|group)\b/';

    public function up(): void
    {
        DB::transaction(function () {
            $seeder = new ContentSeeder;

            $this->rebrand();

            $seeder->replaceItems('about', 'sister_concern');
            $this->updateProjectMenu();

            PageSection::where('page', 'sunwave')->where('key', 'intro')
                ->where('title', 'Sun Wave Hotel and Resort')
                ->update(['title' => 'Important Place of Kuakata']);

            PageSection::where('page', 'project_detail')->where('key', 'floor_plans')
                ->whereNull('title')
                ->update(['title' => 'Sun Wave Hotel & Resort Floor Plans']);

            $seeder->seedSection('home', 'project_gallery');
            $seeder->seedSection('sunwave', 'places');
            foreach (['intro', 'facts', 'features', 'contact'] as $key) {
                $seeder->seedSection('condominium', $key);
            }
        });
    }

    public function down(): void
    {
        DB::transaction(function () {
            PageSection::where('page', 'condominium')->delete();
            PageSection::where('page', 'sunwave')->where('key', 'places')->delete();
            PageSection::where('page', 'home')->where('key', 'project_gallery')->delete();

            PageSection::where('page', 'sunwave')->where('key', 'intro')
                ->where('title', 'Important Place of Kuakata')
                ->update(['title' => 'Sun Wave Hotel and Resort']);

            $menu = PageSection::where('page', 'layout')->where('key', 'project_menu')->first();
            if ($menu) {
                $menu->items()->whereNull('parent_id')->where('title', 'Nanova Condominium')
                    ->update(['title' => 'Land', 'link_url' => null]);

                $isp = $menu->items()->create(['title' => 'ISP', 'sort_order' => 4, 'is_active' => true]);
                $menu->items()->create(['parent_id' => $isp->id, 'title' => 'Song Jozan Internet', 'link_url' => 'isp.html', 'sort_order' => 1, 'is_active' => true]);
            }

            $sister = PageSection::where('page', 'about')->where('key', 'sister_concern')->first();
            if ($sister) {
                $sister->items()->delete();
                foreach ([
                    ['Sun Wave Hotel & Resort', 'A Trusted Destination for memorable moments'],
                    ['Nanova Project management', "Nanova Project Management specializes in comprehensive and efficient project execution\r\nPioneering"],
                    ['Nanova Shop', 'Nanova Shop introduces a Huge amount of Products store in Dhaka'],
                ] as $index => [$title, $subtitle]) {
                    $sister->items()->create(['title' => $title, 'subtitle' => $subtitle, 'sort_order' => $index + 1, 'is_active' => true]);
                }
            }

            $this->replaceInContent(fn (string $text) => str_replace(
                ['Nanova Commercial', 'NANOVA COMMERCIAL'],
                ['Nanova Groups', 'NANOVA GROUPS'],
                $text
            ));
        });
    }

    private function rebrand(): void
    {
        $this->replaceInContent(fn (string $text) => preg_replace_callback(
            self::BRAND_PATTERN,
            fn (array $match) => match (true) {
                ctype_upper($match[1]) => 'COMMERCIAL',
                ctype_upper($match[1][0]) => 'Commercial',
                default => 'commercial',
            },
            $text
        ));
    }

    private function replaceInContent(callable $replace): void
    {
        foreach ([PageSection::query(), SectionItem::query()] as $query) {
            $query->each(function (Model $row) use ($replace) {
                foreach (self::TEXT_COLUMNS as $column) {
                    if (is_string($row->{$column})) {
                        $row->{$column} = $replace($row->{$column});
                    }
                }

                if (is_array($row->meta)) {
                    $row->meta = array_map(
                        fn ($value) => is_string($value) && ! preg_match('#^(https?:|mailto:|tel:|assets/)#i', $value) ? $replace($value) : $value,
                        $row->meta
                    );
                }

                if ($row->isDirty()) {
                    $row->timestamps = false;
                    $row->save();
                }
            });
        }
    }

    private function updateProjectMenu(): void
    {
        $menu = PageSection::where('page', 'layout')->where('key', 'project_menu')->first();
        if (! $menu) {
            return;
        }

        // Deleting the category removes its project links through the parent_id cascade.
        $menu->items()->whereNull('parent_id')->where('title', 'ISP')->get()->each->delete();

        $menu->items()->whereNull('parent_id')->where('title', 'Land')
            ->update(['title' => 'Nanova Condominium', 'link_url' => '/project/condominium']);
    }
};
