<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoteRequest extends FormRequest
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
        $polymorphExistsRule = '';
        if ($this->has('voteable_type')) {
            $polymorphExistsRule .= '|exists:' . $this->voteable_type . ',id';
        }

        return [
            'is_good'       => 'boolean',
            'description'   => 'required',
            'voteable_type' => 'required_with:voteable_id',
            'voteable_id'   => 'required_with:voteable_type' . $polymorphExistsRule,
        ];
    }
}
