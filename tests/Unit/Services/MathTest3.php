<?php

namespace Tests\Unit\Services;

use App\Services\Math;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class MathTest3 extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_se_conseguimos_dividir_dois_numeros_validos(): void
    {
        //arrange
        $service = app(Math::class);

        //act
        $resultado = $service->dividir(9, 3);

        //Assert
        $this->assertEquals(3, $resultado);
    }

    public function test_nao_consegue_dividir_quando_o_divisor_e_igual_zero(): void
    {
         //arrange
         $service = app(Math::class);

         //Assert
         $this->expectException(InvalidArgumentException::class);

         //act
         $service->dividir(9, 0);
    }
}
