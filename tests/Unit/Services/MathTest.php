<?php

namespace Tests\Services\Unit;

use App\Services\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_soma_dois_numeros_corretamente(): void
    {
        //arange
        $mathService = app(Math::class);

        //act
        $result = $mathService->somar(1, 2);

        //assert
        $this->assertEquals(3, $result);
    }
}
