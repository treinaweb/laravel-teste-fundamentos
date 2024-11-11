<?php

namespace App\Actions;

use App\Interfaces\PayPalInterface;

class OrderProcess
{
    public function __construct(
        protected PayPalInterface $payPal
    ) {
    }

    public function execute(): string
    {
        //etapas do processament

        $this->payPal->paymentProcess(123);

        return "Order processed";
    }
}