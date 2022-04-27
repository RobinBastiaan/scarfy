<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $ip
 * @property bool   $is_good
 * @property string $description
 * @property string $voteable_type
 * @property int    $voteable_id
 */
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

        $request = $this;

        return [
            'is_good'       => 'boolean',
            'description'   => 'nullable',
            'voteable_type' => 'required_with:voteable_id',
            'voteable_id'   => 'required_with:voteable_type' . $polymorphExistsRule,
            // validate the IP address contained inside the request, but only for positive votes to make them unique
            'ip'            => [
                'required',
                Rule::unique('votes')->where(function ($query) use ($request) {
                    return $query->where('ip', $request->ip())
                        ->where('voteable_id', $request->voteable_id)
                        ->where('voteable_type', $request->voteable_type)
                        ->where('is_good', 1);
                }),
            ],
        ];
    }

    public function prepareForValidation(): ?StoreVoteRequest
    {
        return $this->merge([
            'ip' => $this->ip(),
        ]);
    }

    public function messages(): array
    {
        return [
            'ip.unique' => __('You have already voted on this specific :type', ['type' => trans_choice($this->voteable_type, 1)]),
        ];
    }
}
