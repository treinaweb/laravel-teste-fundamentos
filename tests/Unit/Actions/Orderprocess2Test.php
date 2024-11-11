<?php

namespace Tests\Unit\Actions;

use App\Actions\OrderProcess2;
use App\Interfaces\PayPalInterface;
use PHPUnit\Framework\TestCase;
use Tests\Unit\TestDoubles\PayPalFake;

class Orderprocess2Test extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_consegue_criar_um_pedido_com_secesso2(): void
    {
        //arrange
        // $paypal = new PayPalFake(true);
        // $orderProcess = new OrderProcess2($paypal);
        app()->bind(PayPalInterface::class, function($app){
            return new PayPalFake(true);
        });
        $orderProcess = app(OrderProcess2::class);
        
        //Act
        $retorno = $orderProcess->execute();

        //Asserts
        $this->assertEquals('Order processed', $retorno);
    }

    public function test_verifica_se_nao_consegue_criar_um_pedido(): void
    {
        //arrange
        app()->bind(PayPalInterface::class, function($app){
            return new PayPalFake(false);
        });
        $orderProcess = app(OrderProcess2::class);
        
        //Act
        $retorno = $orderProcess->execute();

        //Asserts
        $this->assertEquals('Order Error', $retorno);
    }
}
