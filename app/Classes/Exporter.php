<?php

namespace App\Classes;

abstract class Exporter
{
    protected $dataset;
    protected $path;

    public final function export() : void
    {
        // We want the 'algorithm' to open
        // an I/O Stream and write the
        // current dataset to it.
        $this->write((array) $this->dataset);
    }

    public function getDataset () : array
    {
        return (array) $this->dataset;
    }

    public function setDataset (array $array = []) : void
    {
        $this->dataset = (array) $array;
    }

    public abstract function write(array $dataset): void;
}