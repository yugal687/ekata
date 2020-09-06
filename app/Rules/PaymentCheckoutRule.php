<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PaymentCheckoutRule implements Rule
{
    private $message = '';

    public function __construct($request)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
    }


    public function message()
    {
        return $this->message;
    }
}
