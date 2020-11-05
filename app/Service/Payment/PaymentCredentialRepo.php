<?php


namespace App\Service\Payment;

use App\Model\PaymentCredential;

class PaymentCredentialRepo implements PaymentCredentialInterface
{

    public function paypalCredential()
    {
        return PaymentCredential::where('payment_type', 'paypal')->first();

    }

    public function stripeCredential()
    {
        return PaymentCredential::where('payment_type', 'mastercard')->first();
    }

}
