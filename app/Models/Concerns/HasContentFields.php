<?php

namespace App\Models\Concerns;

/**
 * Sections and items share a small set of real columns. Any other field
 * declared in config/cms.php is stored under the `meta` JSON column.
 */
trait HasContentFields
{
    public const COLUMN_FIELDS = ['title', 'subtitle', 'body', 'image', 'link_url'];

    public function value(string $field): ?string
    {
        if (in_array($field, self::COLUMN_FIELDS, true)) {
            return $this->getAttribute($field);
        }

        return $this->meta[$field] ?? null;
    }

    /**
     * Public URL for a stored image or file path.
     */
    public function src(string $field = 'image'): string
    {
        $path = $this->value($field);

        if (blank($path)) {
            return '';
        }

        return preg_match('#^(https?:)?//#i', $path) ? $path : asset($path);
    }

    /**
     * href for a link field. Local paths (assets/..., sunwave.html) resolve
     * against the site root; absolute and special links pass through.
     */
    public function href(string $field = 'link_url'): string
    {
        $link = trim((string) $this->value($field));

        if ($link === '' || str_starts_with(strtolower($link), 'javascript:')) {
            return 'javascript:void(0)';
        }

        return preg_match('#^(https?:|mailto:|tel:|//|/|\#)#i', $link) ? $link : asset($link);
    }

    public function setValue(string $field, ?string $value): void
    {
        if (in_array($field, self::COLUMN_FIELDS, true)) {
            $this->setAttribute($field, $value);

            return;
        }

        $meta = $this->meta ?? [];
        $meta[$field] = $value;
        $this->meta = $meta;
    }
}
