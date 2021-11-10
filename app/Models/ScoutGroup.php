<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScoutGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'website', 'city', 'country', 'scarf_id',
    ];

    public function scarf(): BelongsTo
    {
        return $this->belongsTo(Scarf::class);
    }
}
