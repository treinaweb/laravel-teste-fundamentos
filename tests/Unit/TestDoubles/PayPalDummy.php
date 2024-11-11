<?php

namespace Tests\Unit\TestDoubles;

use App\Interfaces\PayPalInterface;

class PayPalDummy implements PayPalInterface
{
    function paymentProcess()
    {
    }
}
