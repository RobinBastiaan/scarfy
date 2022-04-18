<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property bool $is_good
 * @property string $description
 * @property string $voteable_type
 * @property int $voteable_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $voteable
 */
class Vote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'is_good',
        'description',
        'voteable_type',
        'voteable_id',
    ];

    public function voteable(): MorphTo
    {
        return $this->morphTo();
    }
}
