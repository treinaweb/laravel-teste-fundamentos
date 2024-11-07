<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_verifica_se_soma_dois_numeros_corretamente(): void
    {
        $this->assertEquals(3, somar(1, 2), 'Houve uma falha na hora de somar os 2 numeros');
    }
}

function somar(int $n1, int $n2): int
{
    return $n1 - $n2;
}
