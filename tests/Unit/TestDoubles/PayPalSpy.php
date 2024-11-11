<?php

namespace Tests\Unit\TestDoubles;

use App\Interfaces\PayPalInterface;

class PayPalSpy implements PayPalInterface
{
    private int $quantidadeExecucoes = 0;

    public function paymentProcess()
    {
        $this->quantidadeExecucoes++;
    }

    public function quantidadeExecucoes():int
    {
        return $this->quantidadeExecucoes;
    }
}
