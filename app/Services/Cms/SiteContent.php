<?php

namespace App\Services\Cms;

use App\Models\PageSection;

class SiteContent
{
    private array $loaded = [];

    public function page(string $page): PageContent
    {
        return $this->loaded[$page] ??= new PageContent(
            $page,
            PageSection::with('items')->where('page', $page)->get()->keyBy('key')
        );
    }
}
