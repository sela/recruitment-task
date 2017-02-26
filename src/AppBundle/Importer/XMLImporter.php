<?php

namespace AppBundle\Importer;

use AppBundle\Data\XML;
use GreenCape\Xml\Converter;

class XMLImporter implements ImporterInterface
{
    private $object;
    private $reader;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function load($filename)
    {
        $this->reader = new Converter($filename);
    }

    public function deserialize()
    {
        foreach ($this->reader->data['users'] as $user) {
            $userObject = $this->object->createUser();
            foreach ($user['user'] as $key => $property) {
                $userObject->{'set' . ucfirst(key($property))}($property[key($property)]);
            }

            $this->object->addCollection(new XML($userObject));
        }
    }

    public function getUsers()
    {
        return $this->object;
    }
}