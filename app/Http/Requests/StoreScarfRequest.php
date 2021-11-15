<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreScarfRequest extends FormRequest
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
            'color_scheme'      => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'edge_size'         => 'nullable|numeric|gt:0|lt:100',
            'edge_color_scheme' => ['nullable', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'email address',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // prefix with "#", if the given color would be valid if it started with a "#"
        $colorProperties = ['color_scheme' => $this->color_scheme, 'edge_color_scheme' => $this->edge_color_scheme];

        foreach ($colorProperties as $key => $value) {
            if (preg_match('/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value)) {
                $this->merge([
                    $key => '#' . $value,
                ]);
            }
        }
    }
}
