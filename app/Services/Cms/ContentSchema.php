<?php

namespace App\Services\Cms;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContentSchema
{
    public function pages(): array
    {
        return config('cms.pages');
    }

    public function page(string $page): array
    {
        return $this->pages()[$page] ?? throw new NotFoundHttpException;
    }

    public function section(string $page, string $key): array
    {
        return $this->page($page)['sections'][$key] ?? throw new NotFoundHttpException;
    }

    public function sectionFields(string $page, string $key): array
    {
        return $this->section($page, $key)['fields'] ?? [];
    }

    /**
     * Item definition for a section. Pass $nested = true for the second level
     * (e.g. project links inside a menu category).
     */
    public function itemDefinition(string $page, string $key, bool $nested = false): ?array
    {
        $items = $this->section($page, $key)['items'] ?? null;

        return $nested ? ($items['children'] ?? null) : $items;
    }

    public function rules(array $fields): array
    {
        $rules = [];

        foreach ($fields as $name => $field) {
            $rules[$name] = match ($field['type']) {
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'],
                'file' => ['nullable', 'file', 'mimes:pdf', 'max:20480'],
                'textarea' => ['nullable', 'string', 'max:20000'],
                'url' => ['nullable', 'string', 'max:1000'],
                default => ['nullable', 'string', 'max:255'],
            };

            if (in_array($field['type'], ['image', 'file'], true)) {
                $rules['remove_'.$name] = ['nullable', 'boolean'];
            }
        }

        return $rules;
    }

    public function attributes(array $fields): array
    {
        return array_map(fn (array $field) => $field['label'], $fields);
    }
}
