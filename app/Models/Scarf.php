<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scarf extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_scheme', 'edge_size', 'edge_color_scheme',
    ];

    public function scoutGroups(): HasMany
    {
        return $this->hasMany(ScoutGroup::class);
    }
}
