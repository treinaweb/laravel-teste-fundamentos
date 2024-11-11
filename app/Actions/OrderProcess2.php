<?php

namespace App\Actions;

use App\Interfaces\PayPalInterface;

class OrderProcess2
{
    public function __construct(
        protected PayPalInterface $payPal
    ) {
    }

    public function execute(): string
    {
        //etapas do processamento

        $pagoComSucesso = $this->payPal->paymentProcess();

        if ($pagoComSucesso) {
            return "Order processed";
        }

        return "Order Error";
    }
}