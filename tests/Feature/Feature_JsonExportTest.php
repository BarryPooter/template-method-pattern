<?php

namespace Tests\Feature;

use App\Classes\JsonExporter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Feature_JsonExportTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = new JsonExporter();

        // Prepare a dataset for the output.
        $this->sut->setDataset([
            'hello' => 'hallo'
        ]);
    }

    /**
     * In this test we will test if a file gets written
     * with the expected dataset.
     */
    public function testWritingJsonFile ()
    {
        // Create the file and outputj
        // the dataset into it.
        $this->sut->export();

        // Check if the file exists.
        $file = public_path('testExport.json');
        $this->assertEquals(true, file_exists($file));
    }

    public function testOutputFileContents ()
    {
        $contents = file_get_contents(public_path('testExport.json'));
//        dd($this->sut->getDataset() === (array) json_decode($contents));

        $this->assertEquals($this->sut->getDataset(), (array) json_decode($contents));
        unlink(public_path('testExport.json'));
    }
}
