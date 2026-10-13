<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Models\SectionItem;
use App\Services\Cms\ContentSchema;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(ContentSchema $schema): View
    {
        $itemsPerPage = SectionItem::query()
            ->join('page_sections', 'page_sections.id', '=', 'section_items.page_section_id')
            ->groupBy('page_sections.page')
            ->pluck(DB::raw('count(*)'), 'page_sections.page');

        // Seeded rows have no editor, so only admin changes count as edits.
        $sectionEdits = PageSection::whereNotNull('updated_by')
            ->groupBy('page')
            ->pluck(DB::raw('max(updated_at)'), 'page');

        $itemEdits = SectionItem::query()
            ->join('page_sections', 'page_sections.id', '=', 'section_items.page_section_id')
            ->whereNotNull('section_items.updated_by')
            ->groupBy('page_sections.page')
            ->pluck(DB::raw('max(section_items.updated_at)'), 'page_sections.page');

        $lastEdits = $sectionEdits->union($itemEdits)
            ->map(fn ($date, $page) => max($date, $itemEdits[$page] ?? $date));

        $recent = SectionItem::with(['section', 'editor'])
            ->whereNotNull('updated_by')
            ->latest('updated_at')
            ->limit(10)
            ->get();

        $pages = $schema->pages();

        return view('admin.dashboard', [
            'pages' => $pages,
            'previews' => $this->previews(array_keys($pages)),
            'itemCounts' => $itemsPerPage,
            'lastEdits' => $lastEdits,
            'lastEdit' => $lastEdits->max(),
            'sectionTotal' => collect($pages)->sum(fn (array $page) => count($page['sections'])),
            'itemTotal' => $itemsPerPage->sum(),
            'recent' => $recent,
        ]);
    }

    /**
     * First image found on each page, used as its thumbnail.
     */
    private function previews(array $pages): array
    {
        $sections = PageSection::with(['items' => fn ($query) => $query->whereNotNull('image')->where('is_active', true)])
            ->whereIn('page', $pages)
            ->orderBy('id')
            ->get()
            ->groupBy('page');

        $previews = [];

        foreach ($sections as $page => $pageSections) {
            $source = $pageSections
                ->map(fn (PageSection $section) => $section->image ? $section : $section->items->first())
                ->first(fn ($candidate) => $candidate !== null);

            $previews[$page] = $source?->src();
        }

        return $previews;
    }
}
