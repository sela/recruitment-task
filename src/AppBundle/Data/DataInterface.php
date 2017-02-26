<?php
namespace AppBundle\Data;

interface DataInterface
{
    public function isActive();

    public function getValue();
}