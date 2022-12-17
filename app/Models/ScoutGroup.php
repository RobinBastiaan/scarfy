<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * @property int                          $id
 * @property string                       $name
 * @property string                       $slug
 * @property string|null                  $website
 * @property string                       $city
 * @property string                       $country
 * @property string                       $founded_on
 * @property string|null                  $cancelled_on
 * @property int                          $association_id
 * @property Carbon|null                  $created_at
 * @property Carbon|null                  $updated_at
 * @property-read Association             $association
 * @property-read ScarfUsage|null         $currentScarfUsage
 * @property-read Vote|null               $votes
 * @property-read Collection|ScarfUsage[] $scarfUsages
 * @property-read int|null                $scarf_usages_count
 *
 * @method Builder recentAdditions(int $amount = 6)
 * @method Builder neighboringGroups(ScoutGroup $group)
 * @method Builder filter(Request $request)
 *
 * @mixin Builder
 */
class ScoutGroup extends Model
{
    use HasFactory, HasSlug, HasSEO;

    protected $fillable = [
        'name', 'website', 'city', 'country', 'founded_on', 'cancelled_on', 'association_id',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at');
        });

        static::addGlobalScope('hasScarfUsages', function (Builder $builder) {
            $builder->has('scarfUsages');
        });
    }

    public function scarfUsages(): HasMany
    {
        return $this->hasMany(ScarfUsage::class);
    }

    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class);
    }

    public function votes(): MorphMany
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    public function scopeRecentAdditions(Builder $query, int $amount = 6): void
    {
        $query->has('scarfUsages')
            ->with(['currentScarfUsage.scarf', 'currentScarfUsage'])
            ->orderBy('created_at', 'DESC')
            ->take($amount);
    }

    public function scopeNeighboringGroups(Builder $query, ScoutGroup $group): void
    {
        $query->with('currentScarfUsage.scarf')->where([
            ['city', $group->city],
            ['id', '!=', $group->id],
        ]);
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

    public function scopeFilter(Builder $query, Request $request): void
    {
        if (isset($request->name)) {
            $query->where([
                ['name', 'LIKE', "%{$request->name}%"],
            ]);
        }

        if (isset($request->city)) {
            $query->where([
                ['city', 'LIKE', "%{$request->city}%"],
            ]);
        }
    }

    public function currentScarfUsage(): HasOne
    {
        return $this->hasOne(ScarfUsage::class, '')->latestOfMany('introduced_on');
    }

    public function getDynamicSEOData(): SEOData
    {
        return new SEOData(
            title: $this->name,
            description: $this->city . ' in ' . $this->country,
        );
    }
}
