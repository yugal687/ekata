<?php

namespace App\Service\Payment;

interface PaymentCredentialInterface
{
    public function paypalCredential();

    public function stripeCredential();
}
