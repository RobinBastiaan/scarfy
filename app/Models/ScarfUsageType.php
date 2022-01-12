<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ScarfUsage[] $scarfUsages
 * @property-read int|null $scarf_usages_count
 */
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
