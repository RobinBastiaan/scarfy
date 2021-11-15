<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scarf extends Model
{
    use HasFactory;

    public const PATTERNS = ['Balmoral', 'Cameron Erracht', 'Hunting Stewart', 'Kerr', 'MacDonald', 'Margaret Rose', 'MacLean', 'MacLeod'];
    public const MAX_EDGES_PER_SCARF = 4;
    public const WIDTH = 95;
    public const HEIGHT = 45;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function scoutGroups(): HasMany
    {
        return $this->hasMany(ScoutGroup::class);
    }

    public function setColorSchemeAttribute(string $colorScheme): void
    {
        $this->attributes['color_scheme'] = strtolower($colorScheme);
    }

    public function has_pattern(string $property = 'color_scheme'): bool
    {
        $patterns = self::PATTERNS;
        array_walk($patterns, static function (&$value) {
            $value = str_replace(' ', '-', strtolower($value));
        });

        return in_array($this->$property, $patterns, true);
    }
}
