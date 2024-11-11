<?php

namespace Tests\Unit\Actions;

use App\Actions\OrderProcess2;
use App\Interfaces\PayPalInterface;
use PHPUnit\Framework\TestCase;

class OrderProcessStubTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_consegue_criar_um_pedido_com_secesso4(): void
    {
        //arrange
        $paypal = $this->createStub(PayPalInterface::class);
        $paypal->method('paymentProcess')->willReturn(true);

        app()->instance(PayPalInterface::class, $paypal);
        $orderProcess = app(OrderProcess2::class);

        //act
        $retorno = $orderProcess->execute();

        //asserts
        $this->assertEquals('Order processed', $retorno);
    }

    public function test_verifica_se_nao_consegue_criar_um_pedido4(): void
    {
        //arrange
        $paypal = $this->createStub(PayPalInterface::class);
        $paypal->method('paymentProcess')->willReturn(false);

        app()->instance(PayPalInterface::class, $paypal);
        $orderProcess = app(OrderProcess2::class);

        //act
        $retorno = $orderProcess->execute();

        //asserts
        $this->assertEquals('Order Error', $retorno);
    }
}
