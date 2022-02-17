<?php

namespace App\Http\Requests;

use App\Models\Scarf;
use App\Rules\ColorOrPattern;
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
}
