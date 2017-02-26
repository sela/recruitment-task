<?php
/**
 * Created by PhpStorm.
 * User: selayair
 * Date: 26/02/2017
 * Time: 12:41
 */

namespace AppBundle\Entity;

use AppBundle\Data\DataInterface;

interface CollectionInterface
{
    public function createUser();

    public function addCollection(DataInterface $data);

    public function getUsersCollection();
}