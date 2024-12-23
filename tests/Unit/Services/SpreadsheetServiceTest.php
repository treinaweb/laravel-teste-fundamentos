<?php

namespace Tests\Unit\Services;

use App\Services\SpreadsheetService;
use Mockery;
use PHPUnit\Framework\TestCase;

class SpreadsheetServiceTest extends TestCase
{
    public function test_processa_arquivo_com_dados_validos(): void
    {
        //Arrange
        $data = [
            ['product_code' => 'VALID1', 'quantity' => 1],
            ['product_code' => 'VALID2', 'quantity' => 2],
        ];

        $import = Mockery::mock();
        $import->shouldReceive('import')
                ->with('caminho/do/arquivo')
                ->andReturn($data);
        app()->instance('importer', $import);

        $service = app(SpreadsheetService::class);

        //Act
        $validItems = $service->processSpreadsheet('caminho/do/arquivo');

        //Asserts
        $this->assertCount(2, $validItems);
        $this->assertEquals($data, $validItems);
    }

    public function test_processa_somente_dados_validos(): void
    {
        //Arrange
        $data = [
            ['product_code' => 'VALID1', 'quantity' => 10],
            ['product_code' => null, 'quantity' => 5],
            ['product_code' => null, 'quantity' => null],
            ['product_code' => 'INVALID1', 'quantity' => null],
            ['product_code' => 'INVALID2', 'quantity' => 0]
        ];

        $import = Mockery::mock();
        $import->shouldReceive('import')
                ->with('caminho/do/arquivo')
                ->andReturn($data);
        app()->instance('importer', $import);

        $service = app(SpreadsheetService::class);

        //Act
        $validItems = $service->processSpreadsheet('caminho/do/arquivo');

        //Asserts
        $this->assertCount(1, $validItems);
        $this->assertEquals(
            [
                ['product_code' => 'VALID1', 'quantity' => 10],
            ], 
            $validItems
        );
    }
}
