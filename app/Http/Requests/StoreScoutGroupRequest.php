<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'website'        => ['nullable', 'unique:scout_groups', 'active_url'],
            'city'           => ['string'],
            'country'        => ['string', 'country'],
            'founded_on'     => ['date'],
            'cancelled_on'   => ['nullable', 'date', 'after_or_equal:founded_on'],
            'association_id' => ['integer', 'exists:associations,id'],
        ];
    }

    public function prepareForValidation(): ?StoreScoutGroupRequest
    {
        // We allow users to input a website without scheme, but we need that for the validation.
        $website = empty(parse_url($this->website)['scheme'])
            ? 'https://' . ltrim($this->website) // only allow https
            : $this->website;
        $website = strtolower(rtrim($website, '/'));

        return $this->merge([
            'website' => $website,
        ]);
    }

    protected function passedValidation(): void
    {
        $this->replace([
            // Store website in the db without scheme.
            'website' => preg_replace("#^[^:/.]*[:/]+#", "", $this->website),
        ]);
    }
}
