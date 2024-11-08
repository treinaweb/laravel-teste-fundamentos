<?php

namespace App\Services;

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
}