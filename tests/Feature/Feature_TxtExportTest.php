<?php

namespace Tests\Feature;

use App\Classes\TxtExporter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Feature_TxtExportTest extends TestCase
{
    protected $sut;

    protected function setUp()
    {
        parent::setUp();
        $this->sut = new TxtExporter();

        // Prepare a dataset for the output.
        $this->sut->setDataset([
            'hello' => 'hallo'
        ]);
    }

    /**
     * Test if the write method creates a file
     * and wether the output is correct.
     */
    public function testWriteMethodFile ()
    {
        // Create the file and outputj
        // the dataset into it.
        $this->sut->export();

        // Check if the file exists.
        $file = public_path('testExport.txt');
        $this->assertEquals(true, file_exists($file));
    }

    public function testOutputFileContents ()
    {
        $contents = file_get_contents(public_path('testExport.txt'));

        $this->assertEquals($this->sut->getDataset(), (array) json_decode($contents));
        unlink(public_path('testExport.txt'));
    }
}
