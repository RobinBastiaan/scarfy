<?php

namespace App\Http\Requests;

use App\Models\Scarf;
use App\Rules\ColorOrPattern;
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
        $edgeRues = [];

        for ($i = 1; $i <= Scarf::MAX_EDGES_PER_SCARF; $i++) {
            $edgeRues['edge_size' . $i] = 'nullable|numeric|gt:0|lt:100';
            $edgeRues['edge_color_scheme' . $i] = ['nullable', new ColorOrPattern()];
            $edgeRues['edge_color_scheme_right' . $i] = ['nullable', new ColorOrPattern()];
        }

        return [
            'color_scheme'       => ['required', new ColorOrPattern()],
            'color_scheme_right' => ['nullable', new ColorOrPattern()],
            $edgeRues,
            'image'              => 'mimes:png,jpg,jpeg|max:5048',
            'text'               => ['nullable', 'string'],
            'text_color'         => ['nullable', new ColorOrPattern()],
            'text_font'          => ['nullable', 'string'],
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
        $this->prefixValidColors([
            'color_scheme'      => $this->color_scheme,
            'edge_color_scheme' => $this->edge_color_scheme,
            'text_color'        => $this->text_color,
        ]);
    }

    /**
     * Prefix with "#", if the given color would be valid if it started with a "#".
     *
     * @param array $colorProperties
     */
    private function prefixValidColors(array $colorProperties): void
    {
        foreach ($colorProperties as $key => $value) {
            if (preg_match('/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value)) {
                $this->merge([
                    $key => '#' . $value,
                ]);
            }
        }
    }
}
