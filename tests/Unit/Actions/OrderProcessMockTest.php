<?php

namespace Tests\Unit\Actions;

use App\Actions\OrderProcess;
use App\Interfaces\PayPalInterface;
use Mockery;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\TestCase;

class OrderProcessMockTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_o_pagamento_foi_realizado_apenas_uma_vez_phpunit(): void
    {
        //arrange
        $paypal = $this->createMock(PayPalInterface::class);
        $paypal->expects($this->once())
                ->method('paymentProcess')
                ->with($this->isType(IsType::TYPE_INT))
                ->willReturn(true);

        $orderProcess = new OrderProcess($paypal);

        //act
        $retorno = $orderProcess->execute();

        //asserts
        $this->assertEquals('Order processed', $retorno);
    }

    public function test_verifica_se_o_pagamento_foi_realizado_apenas_uma_vez_mockery(): void
    {
        //arrange
        $paypal = Mockery::mock(PayPalInterface::class);
        $paypal->shouldReceive('paymentProcess')
                ->once()
                ->with(Mockery::type('int'))
                ->andReturn(true);

        app()->instance(PayPalInterface::class, $paypal);
        $orderProcess = app(OrderProcess::class);

        //act
        $retorno = $orderProcess->execute();

        //asserts
        $this->assertEquals('Order processed', $retorno);
    }
}
