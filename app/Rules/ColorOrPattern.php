<?php

namespace App\Rules;

use App\Models\Scarf;
use Illuminate\Contracts\Validation\Rule;

class ColorOrPattern implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value)
            || in_array($value, Scarf::PATTERNS, true);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return trans('validation.color_or_pattern');
    }
}
