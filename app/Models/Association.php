<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $founded_on
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ScoutGroup[] $scoutGroups
 * @property-read int|null $scout_groups_count
 */
class Association extends Model
{
    use HasFactory;

    public function scoutGroups(): HasMany
    {
        return $this->hasMany(ScoutGroup::class);
    }
}
