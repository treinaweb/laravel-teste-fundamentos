<?php

namespace App\Services;

use InvalidArgumentException;

class Math
{
    public function somar(int $n1, int $n2): int
    {
        return $n1 + $n2;
    }

    public function subtrair(int $n1, int $n2): int
    {
        return $n1 - $n2;
    }

    public function dividir(int $dividendo, int $divisor): float
    {
        if ($divisor === 0) {
            throw new InvalidArgumentException('Não é possível dividir um numero por zero');
        }

        return $dividendo / $divisor;
    }
}