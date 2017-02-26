<?php

namespace AppBundle\Entity;

use AppBundle\Data\DataInterface;

class UsersCollection implements CollectionInterface
{
    private $usersList;

    public function __construct($usersList = null)
    {
        $this->usersList = [];
        if (!$usersList) {
            $this->usersList = $usersList;
        }
    }

    public function createUser()
    {
        $user = new User();

        return $user;
    }

    public function addCollection(DataInterface $data)
    {
        $this->usersList[] = $data;
    }

    public function getUsersCollection()
    {
        return $this->usersList;
    }
}