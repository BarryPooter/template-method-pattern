<?php

namespace Tests\Feature;

use App\Classes\Exporter;
use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Feature_ExporterTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = \Mockery::mock(Exporter::class);
        $this->sut->shouldReceive('setDataset')
            ->once()
            ->andReturnNull();
    }

    /**
     * This test will test if the dataset is variable
     * and can be set- & get individually.
     */
    public function testDatasetVariability ()
    {
        $this->sut->shouldReceive('getDataset')->once()
            ->andReturn([]);

        // First we will assume that the dataset is empty.
        $this->assertEquals([], $this->sut->getDataset());

        // Now we will change the data and see if the
        // dataset is actually flexible.
        $this->sut->setDataset([1]);

        $this->sut->shouldReceive('getDataset')
            ->andReturn([1]);
        $this->assertEquals([1], $this->sut->getDataset());

        $this->assertNotEquals([], $this->sut->getDataset());
    }
}
