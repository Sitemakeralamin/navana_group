<?php

namespace App\Models;

use App\Models\Concerns\HasContentFields;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

#[Fillable(['page', 'key', 'title', 'subtitle', 'body', 'image', 'link_url', 'meta'])]
class PageSection extends Model
{
    use HasContentFields;

    protected function casts(): array
    {
        return [
            'meta' => 'array',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(SectionItem::class)->orderBy('sort_order')->orderBy('id');
    }

    public function topItems(): HasMany
    {
        return $this->items()->whereNull('parent_id');
    }

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Visible top-level items, in display order, with visible children loaded.
     */
    public function visibleItems(): Collection
    {
        $items = $this->relationLoaded('items') ? $this->items : $this->items()->get();
        $visible = $items->where('is_active', true);

        return $visible
            ->whereNull('parent_id')
            ->each(fn (SectionItem $item) => $item->setRelation(
                'children',
                $visible->where('parent_id', $item->id)->values()
            ))
            ->values();
    }
}
