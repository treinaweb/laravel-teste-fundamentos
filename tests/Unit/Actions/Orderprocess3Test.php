<?php

namespace Tests\Unit\Actions;

use App\Actions\OrderProcess;
use App\Interfaces\PayPalInterface;
use PHPUnit\Framework\TestCase;
use Tests\Unit\TestDoubles\PayPalSpy;

class Orderprocess3Test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_o_pagamento_foi_executado_apenas_uma_vez(): void
    {
        //arrange
        $paypalSpy = app(PayPalSpy::class);
        app()->instance(PayPalInterface::class, $paypalSpy);
        $orderProcess = app(OrderProcess::class);

        //act
        $retorno = $orderProcess->execute();

        //asserts
        $this->assertEquals('Order processed', $retorno);
        $this->assertEquals(1, $paypalSpy->quantidadeExecucoes());
    }
}
