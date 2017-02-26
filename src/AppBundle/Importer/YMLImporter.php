<?php
namespace AppBundle\Importer;

use AppBundle\Data\YML;
use Symfony\Component\Yaml\Yaml;

class YMLImporter implements ImporterInterface
{
    private $object;
    private $reader;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function load($filename)
    {
        $this->reader = Yaml::parse(file_get_contents($filename));
    }

    public function deserialize()
    {
        foreach ($this->reader['users'] as $user) {
            $userObject = $this->object->createUser();
            foreach ($user as $key => $property) {
                $userObject->{'set' . ucfirst($key)}($property);
            }

            $this->object->addCollection(new YML($userObject));
        }
    }

    public function getUsers()
    {
        return $this->object;
    }
}