<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class jobarray implements ValidationRule
{
   
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(is_array($value) && !empty($value)){
            $fail('required filed');
        }
    }
}
