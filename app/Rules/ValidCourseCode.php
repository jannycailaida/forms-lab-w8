<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidCourseCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Tumatanggap ng 2-6 capital letters na sinusundan ng 1-4 numbers (hal. IT101, CS50, WEB3)
        if (! preg_match('/^[A-Z]{2,6}\d{1,4}$/', (string) $value)) {
            $fail('The :attribute must be 2–6 capital letters followed by numbers (e.g. IT101, CS50).');
        }
    }
}