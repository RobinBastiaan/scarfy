<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScarfUsageType extends Model
{
    use HasFactory;

    protected $fillable = ['*'];

    public const TYPES = ['group', 'regional', 'national', 'event', 'special', 'anniversary'];

    public function scarfUsages(): HasMany
    {
        return $this->hasMany(ScarfUsage::class);
    }
}
