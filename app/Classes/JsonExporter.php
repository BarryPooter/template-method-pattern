<?php

namespace App\Classes;

class JsonExporter extends Exporter
{
    /**
     * Open an I/O resource and write
     * away the received dataset to
     * a JSON-formatted file.
     */
    public function write(array $dataset): void
    {
        // Where should the file be stored?
        $path = public_path('testExport.json');

        // Open a stream and write away the dataset.
        $resource = fopen($path, 'w+');
        fwrite($resource, json_encode($this->getDataset()));
        fclose($resource);
    }
}