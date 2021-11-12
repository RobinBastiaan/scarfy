<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scarf extends Model
{
    use HasFactory;

    public const PATTERNS = ['Balmoral', 'Cameron Erracht', 'Hunting Stewart', 'Kerr', 'MacDonald', 'Margaret Rose', 'MacLean', 'MacLeod'];

    protected $fillable = [
        'color_scheme', 'edge_size', 'edge_color_scheme',
    ];

    public function scoutGroups(): HasMany
    {
        return $this->hasMany(ScoutGroup::class);
    }

    public function has_pattern(): bool
    {
        $patterns = self::PATTERNS;
        array_walk($patterns, static function (&$value) {
            $value = str_replace(' ', '_', strtolower($value));
        });

        return in_array($this->color_scheme, $patterns, true);
    }
}
