<?php
namespace AppBundle\Importer;

interface ImporterInterface
{
    public function load($filename);

    public function deserialize();
}