<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RegnoValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if( !preg_match('/[uU]\d{2}[a-zA-Z]{2}[123]{1}\d{3}$/', $value)) {
            $fail('Invalid registration number.');
        }
    }
}
