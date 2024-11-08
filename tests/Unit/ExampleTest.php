<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_array_asserts(): void
    {
        $nomes = ['joão', 'maria', 'pedro'];
        $this->assertContains('maria', $nomes);
        $this->assertNotContains('elton', $nomes);

        $this->assertCount(3, $nomes);

        $pessoa = ['nome' => 'joão', 'idade' => 25];
        $this->assertArrayHasKey('nome', $pessoa);
        $this->assertArrayNotHasKey('cpf', $pessoa);

        $nomes2 = ['joão', 'maria', 'pedro'];
        $this->assertEquals($nomes, $nomes2);
        $this->assertNotEquals($nomes, $pessoa);
    }
}
