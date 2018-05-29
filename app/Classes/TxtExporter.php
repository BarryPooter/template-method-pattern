<?php

namespace App\Classes;

class TxtExporter extends Exporter
{
    public function write(array $dataset): void
    {
        $path = public_path('testExport.txt');

        $resource = fopen($path, 'w+');
        fwrite($resource, json_encode($this->getDataset()));
        fclose($resource);
    }
}