<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use App\Services\Cms\ContentEditor;
use App\Services\Cms\ContentSchema;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectionController extends Controller
{
    public function __construct(private ContentSchema $schema) {}

    public function index(string $page): View
    {
        $definition = $this->schema->page($page);

        $sections = PageSection::where('page', $page)
            ->withCount('items')
            ->get()
            ->keyBy('key');

        return view('admin.sections.index', compact('page', 'definition', 'sections'));
    }

    public function edit(string $page, string $key): View
    {
        $definition = $this->schema->section($page, $key);
        $section = PageSection::firstOrCreate(['page' => $page, 'key' => $key]);
        $section->load('items');

        return view('admin.sections.edit', [
            'page' => $page,
            'pageDefinition' => $this->schema->page($page),
            'definition' => $definition,
            'section' => $section,
            'items' => $section->items->whereNull('parent_id')->values(),
            'children' => $section->items->whereNotNull('parent_id')->groupBy('parent_id'),
        ]);
    }

    public function update(Request $request, ContentEditor $editor, string $page, string $key): RedirectResponse
    {
        $fields = $this->schema->sectionFields($page, $key);
        $section = PageSection::firstOrCreate(['page' => $page, 'key' => $key]);

        $input = $request->validate(
            $this->schema->rules($fields),
            [],
            $this->schema->attributes($fields)
        );

        $editor->updateSection($section, $fields, $input, $request->user()->id);

        return back()->with('status', 'Section saved.');
    }
}
