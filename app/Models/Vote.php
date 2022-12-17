<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * @property int                  $id
 * @property string               $ip
 * @property bool                 $is_good
 * @property string               $description
 * @property string               $voteable_type
 * @property int                  $voteable_id
 * @property Carbon|null          $created_at
 * @property Carbon|null          $updated_at
 * @property-read Model|\Eloquent $voteable
 *
 * @mixin Builder
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
        'ip',
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
