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

        return view('admin.dashboard', [
            'pages' => $schema->pages(),
            'itemCounts' => $itemsPerPage,
            'lastEdits' => $lastEdits,
            'recent' => $recent,
        ]);
    }
}
