<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
