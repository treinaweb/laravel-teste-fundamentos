<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertNull;

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

    function test_object_asserts(): void
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);

        $user->name = 'elton';
        $this->assertObjectHasProperty('name', $user);
        $this->assertEquals('elton', $user->name);

        $this->assertNull($user->idade);

        $user2 = new User();
        $user2->name = 'elton';

        $this->assertEquals($user, $user2);
    }
}
