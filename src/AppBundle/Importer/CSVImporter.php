<?php

namespace AppBundle\Importer;

use AppBundle\Data\CSV;
use EasyCSV\Reader;

class CSVImporter implements ImporterInterface
{
    private $object;
    private $reader;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function load($filename)
    {
        $this->reader = new Reader($filename);
    }

    public function deserialize()
    {
        foreach ($this->reader->getAll() as $user) {
            $userObject = $this->object->createUser();
            foreach ($user as $key => $property) {
                $userObject->{'set' . ucfirst($key)}($property);
            }

            $this->object->addCollection(new CSV($userObject));
        }
    }

    public function getUsers()
    {
        return $this->object;
    }
}