<?php

namespace Tests\Services\Unit;

use App\Services\Math;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    private static ?Math $mathService;

    public static function setUpBeforeClass(): void
    {
        static::$mathService = app(Math::class);
    }

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     $this->mathService = app(Math::class);
    // }

    /**
     * A basic unit test example.
     */
    public function test_verifica_se_soma_dois_numeros_corretamente(): void
    {
        //act
        $result = static::$mathService->somar(1, 2);

        //assert
        $this->assertEquals(3, $result);
    }

    public function test_verifica_se_subtrai_dois_numeros_corretamente(): void
    {
        //act
        $result = static::$mathService->subtrair(9, 4);

        //assert
        $this->assertEquals(5, $result);
    }

    // protected function tearDown(): void
    // {
    //     parent::tearDown();

    //     $this->mathService = null;
    // }

    public static function tearDownAfterClass(): void
    {
        static::$mathService = null;
    }
}
