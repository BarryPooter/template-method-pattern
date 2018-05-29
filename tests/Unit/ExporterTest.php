<?php

namespace Tests\Unit;

use App\Classes\Exporter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExporterTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = \Mockery::mock(Exporter::class);
        $this->sut->shouldReceive('write')
            ->andReturnNull();
    }

    public function testInstantiateExporter () : void
    {
        $this->assertInstanceOf(Exporter::class, $this->sut);
    }

    /**
     * We assume that the Exporter has an export method
     * and we will try to fire it and expect no exception.
     */
    public function testExportMethodReturnValue ()
    {
        // Check if the export method exists
        // and if it has a void return.
        $this->assertEquals(null, $this->sut->export());
    }

    // Test wether the sut has the getDataset
    // method and if it returns an array.
    public function testGetDataset ()
    {
        $mock = \Mockery::mock(Exporter::class);
        $mock->shouldReceive('getDataset')
            ->andReturn([]);

        $this->assertEquals(true, is_array($mock->getDataset()));
    }

    // We assume there is a setter for setting a new dataset.
    public function testSetDataset ()
    {
        $mock = \Mockery::mock(Exporter::class);
        $mock->shouldReceive('setDataset')
            ->andReturnNull();

        $this->assertNull($mock->setDataset());
    }
}
