<?php

namespace Tests\Unit\Actions;

use App\Actions\OrderProcess;
use App\Services\PayPal;
use PHPUnit\Framework\TestCase;
use Tests\Unit\TestDoubles\PayPalDummy;

class OrderprocessTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_consegue_criar_um_pedido_com_secesso(): void
    {
        //Arrange
        $paypal = new PayPalDummy();
        $orderProcess = new OrderProcess($paypal);

        //Act
        $retorno = $orderProcess->execute();

        //Asserts
        $this->assertEquals("Order processed", $retorno);
    }
}