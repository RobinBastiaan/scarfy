<?php

namespace App\Http\Requests;

use App\Models\ScoutGroup;
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

    public function messages(): array
    {
        $groupByName = ScoutGroup::where('name', $this->name)->withoutGlobalScope('hasScarfUsages')->first();
        $groupByWebsite = ScoutGroup::where('website', $this->website)->withoutGlobalScope('hasScarfUsages')->first();

        return [
            'name.unique'    => __('This :type is already being used by <a href=":route">:name</a>.', [
                'type'  => __('name'),
                'route' => $groupByName ? route('groups.show', $groupByName->slug) : null,
                'name'  => $groupByName->name ?? null,
            ]),
            'website.unique' => __('This :type is already being used by <a href=":route">:name</a>.', [
                'type'  => __('website'),
                'route' => $groupByWebsite ? route('groups.show', $groupByWebsite->slug) : null,
                'name'  => $groupByWebsite->name ?? null,
            ]),
        ];
    }

    public function prepareForValidation(): ?StoreScoutGroupRequest
    {
        // We allow users to input a website without scheme, but we need that for the validation.
        $website = !empty($this->website) && empty(parse_url($this->website)['scheme'])
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
