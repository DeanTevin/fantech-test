<?php

namespace App\Containers\AppSection\Epresence\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EPresenceDateRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $todayStart = Carbon::today();
        $tomorrowStart = Carbon::tomorrow();
        if (!Carbon::parse($value)->between($todayStart->subDay(), $tomorrowStart)) {
            $fail('The :attribute must be a date after yesterday 00:00 and before tomorrow 00:00.');
        }
    }
}
