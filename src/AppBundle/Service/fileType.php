<?php
/**
 * Created by PhpStorm.
 * User: selayair
 * Date: 23/02/2017
 * Time: 23:50
 */

namespace AppBundle\Service;

use AppBundle\Importer\CSVImporter;
use AppBundle\Importer\XMLImporter;
use AppBundle\Importer\YMLImporter;

class fileType
{
    const FileSeprator = '.';
    private $filename;
    private $fileType;
    private $collectionType;

    public function __construct($filename)
    {
        if (!$this->validFilename($filename)) {
            new \Exception('Filename  incorrect');
        }

        $this->filename = $filename;
    }

    private function validFilename($filename)
    {
        if (preg_match('/[^A-Za-z0-9 _ .-]/', $filename)) {
            return true;
        }

        return false;
    }

    public function getFileType()
    {
        $this->fileType = substr($this->filename, strrpos($this->filename, self::FileSeprator) + 1);

        return $this;
    }

    public function setCollectionType($collectionType)
    {
        $this->collectionType = $collectionType;
    }

    public function getServiceName()
    {
        if ($this->fileType === 'xml') {
            return new XMLImporter($this->collectionType);
        } elseif ($this->fileType === 'yml') {
            return new YMLImporter($this->collectionType);
        } elseif ($this->fileType === 'csv') {
            return new CSVImporter($this->collectionType);
        }

        throw new \Exception('Service not exist');
    }
}