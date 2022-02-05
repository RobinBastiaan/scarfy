<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGroupToScarfRequest extends FormRequest
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
            'scout_group_id'      => ['required', 'exists:scout_groups,id'],
            'scarf_usage_type_id' => ['required', 'exists:scarf_usage_types,id'],
            'introduced_on'       => ['required', 'date'],
            'used_until'          => ['nullable', 'string'],
        ];
    }
}
