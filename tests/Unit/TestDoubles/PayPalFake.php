<?php

namespace Tests\Unit\TestDoubles;

use App\Interfaces\PayPalInterface;

class PayPalFake implements PayPalInterface
{
    public function __construct(
        private bool $retorno
    ){}
    
    function paymentProcess()
    {
        return $this->retorno;
    }
}
