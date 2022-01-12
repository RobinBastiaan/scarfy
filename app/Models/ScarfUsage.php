<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $introduced_on
 * @property string|null $used_until
 * @property int $scarf_id
 * @property int $scout_group_id
 * @property int $scarf_usage_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Scarf $scarf
 * @property-read \App\Models\ScarfUsageType $scarfUsageType
 * @property-read \App\Models\ScoutGroup $scoutGroup
 */
class ScarfUsage extends Model
{
    use HasFactory;

    protected $with = ['scarfUsageType'];

    protected $fillable = ['*'];

    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope('order', static function (Builder $builder) {
            $builder->orderBy('introduced_on', 'desc');
        });
    }

    public function scoutGroup(): BelongsTo
    {
        return $this->belongsTo(ScoutGroup::class);
    }

    public function scarf(): BelongsTo
    {
        return $this->belongsTo(Scarf::class);
    }

    public function scarfUsageType(): BelongsTo
    {
        return $this->belongsTo(ScarfUsageType::class);
    }
}
