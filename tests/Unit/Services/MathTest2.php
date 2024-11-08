<?php

namespace Tests\Unit\Services;

use App\Services\Math;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MathTest2 extends TestCase
{
    /**
     * A basic unit test example.
     */
    #[DataProvider('somaProvider')]
    public function test_consegue_somar_valores($n1, $n2, $valorEsperado): void
    {
        //arrange
        $service = app(Math::class);

        //act
        $resultado = $service->somar($n1, $n2);

        //asserts
        $this->assertEquals($valorEsperado, $resultado);
    }

    public static function somaProvider(): array
    {
        return [
            'valores_positivos' => [1, 2, 3],
            'valores_negativos' => [-1, -2, -3],
            'soma com zero' => [0, 5, 5],
            'soma de positivo e negativo' => [10, -5, 5],
            'soma com valores grandes' => [1000, 2000, 3000],
        ];    
    }

}
