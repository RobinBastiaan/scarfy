<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Scarf extends Model
{
    use HasFactory;

    /**
     * These are the pattern and colors sold at scoutshop.nl
     */
    public const PATTERNS = ['Balmoral', 'Cameron Erracht', 'Hunting Stewart', 'Kerr', 'MacDonald', 'Margaret Rose', 'MacLean', 'MacLeod'];
    public const COLORS = [
        '#ff0000', '#000000', '#ffedbf', '#ff8400', '#ffffff', '#670299', '#eeff00', '#8f8f8f',
        '#450dff', '#29cdff', '#a1ff4a', '#6e4b16', '#2f3a80', '#ffe042', '#751421', '#093b09',
    ];

    public const MAX_EDGES_PER_SCARF = 4;
    public const WIDTH = 95;
    public const HEIGHT = 45;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('created_at');
        });

        static::addGlobalScope('whereHas', function (Builder $builder) {
            $builder->whereHas('scarfUsages');
        });
    }

    public function scarfUsages(): HasMany
    {
        return $this->hasMany(ScarfUsage::class);
    }

    public function setColorSchemeAttribute(string $colorScheme): void
    {
        $this->attributes['color_scheme'] = str_replace(' ', '-', strtolower($colorScheme));
    }

    public function hasPattern(string $property = 'color_scheme'): bool
    {
        $patterns = self::PATTERNS;
        array_walk($patterns, static function (&$value) {
            $value = str_replace(' ', '-', strtolower($value));
        });

        return in_array($this->$property, $patterns, true);
    }

    public function scopeFilter(Builder $query, Request $request): void
    {
        if (isset($request->with_diagonal) && $request->with_diagonal === '0') {
            $query->where([
                ['color_scheme_right', null],
            ]);
        }

        if (isset($request->without_diagonal) && $request->without_diagonal === '0') {
            $query->where([
                ['color_scheme_right', '!=', null],
            ]);
        }

        if (isset($request->with_border) && $request->with_border === '0') {
            $query->where([
                ['edge_size1', null],
            ]);
        }

        if (isset($request->without_border) && $request->without_border === '0') {
            $query->where([
                ['edge_size1', '!=', null],
            ]);
        }

        if (isset($request->with_image) && $request->with_image === '0') {
            $query->where([
                ['image_path', null],
            ]);
        }

        if (isset($request->without_image) && $request->without_image === '0') {
            $query->where([
                ['image_path', '!=', null],
            ]);
        }
    }
}
