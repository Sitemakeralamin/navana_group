<?php

namespace App\Services\Cms;

use App\Models\PageSection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class PageContent
{
    /**
     * @param  Collection<string, PageSection>  $sections
     */
    public function __construct(
        private string $page,
        private Collection $sections,
    ) {}

    /**
     * Never returns null, so templates keep rendering when a section has not
     * been seeded yet.
     */
    public function section(string $key): PageSection
    {
        return $this->sections->get($key) ?? tap(
            new PageSection(['page' => $this->page, 'key' => $key]),
            fn (PageSection $section) => $section->setRelation('items', new EloquentCollection)
        );
    }
}
