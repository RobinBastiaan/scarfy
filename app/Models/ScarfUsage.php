<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
