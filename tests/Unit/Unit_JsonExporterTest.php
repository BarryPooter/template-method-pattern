<?php

namespace Tests\Unit;

use App\Classes\Exporter;
use App\Classes\JsonExporter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Unit_JsonExporterTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = \Mockery::mock(JsonExporter::class);
        $this->sut->shouldReceive('write')
            ->andReturnNull();
    }

    // Test wether the JsonExport is an instance of
    // the Exporter class itself, and thus is extended.
    public function testExporterExtension () : void
    {
        $this->assertInstanceOf(Exporter::class, $this->sut);
    }

    // Test if the write method is available and
    // it returns void as return type.
    public function testWriteMethod () : void
    {
        $this->sut->shouldReceive('getDataset')
            ->andReturn();

        $this->assertNull($this->sut->write($this->sut->getDataset()));
    }
}
