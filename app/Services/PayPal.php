<?php

namespace App\Services;

use App\Interfaces\PayPalInterface;

class PayPal implements PayPalInterface
{
    public function paymentProcess()
    {
        //Cria o pagamento no gateway

        return true;
    }
}