<?php

namespace App\Http\Resources;

use App\Models\Scarf;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Scarf
 */
class ScarfResource extends JsonResource
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public string $collects = Scarf::class;

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'                 => $this->id,
            'color_scheme'       => $this->color_scheme,
            'color_scheme_right' => $this->color_scheme_right,
        ];
    }
}
