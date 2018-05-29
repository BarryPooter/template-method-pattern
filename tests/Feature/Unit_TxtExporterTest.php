<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Unit_TxtExporterTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = \Mockery::mock(\App\Classes\TxtExporter::class);
    }

    public function testInstantiation () : void
    {
        $this->assertInstanceOf(\App\Classes\TxtExporter::class, $this->sut);
    }
}
