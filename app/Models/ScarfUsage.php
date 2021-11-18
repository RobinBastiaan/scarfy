<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScarfUsage extends Model
{
    use HasFactory;

    protected $with = ['scarf'];

    protected $fillable = ['*'];

    public function scoutGroup(): BelongsTo
    {
        return $this->belongsTo(ScoutGroup::class);
    }

    public function scarf(): BelongsTo
    {
        return $this->belongsTo(Scarf::class);
    }
}
