<?php

namespace App\Http\Requests;

use App\Models\Scarf;
use App\Rules\ColorOrPattern;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreScoutGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'           => ['string', 'unique:scout_groups'],
            'website'        => ['nullable', 'active_url'],
            'city'           => ['string'],
            'country'        => ['string', 'country'],
            'founded_on'     => ['date'],
            'cancelled_on'   => ['nullable', 'date', 'after_or_equal:founded_on'],
            'association_id' => ['integer', 'exists:associations,id'],
        ];
    }
}
