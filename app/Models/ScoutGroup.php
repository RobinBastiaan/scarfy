<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ScoutGroup extends Model
{
    use HasFactory, HasSlug;

    protected $with = ['scarf'];

    protected $fillable = [
        'name', 'website', 'city', 'country', 'founded_on', 'cancelled_on', 'association_id', 'scarf_id',
    ];

    public function scarf(): BelongsTo
    {
        return $this->belongsTo(Scarf::class);
    }

    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class);
    }

    /*
     * Prefix the website to make it a valid external url.
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->website ? '//' . $this->website : null;
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
