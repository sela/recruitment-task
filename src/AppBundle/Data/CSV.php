<?php

namespace AppBundle\Data;

class CSV implements DataInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function isActive()
    {
        if (!isset($this->data)) {
            throw new \Exception('Incorrect Data');
        }

        if ($this->data->getActive() === 'true') {
            return true;
        }

        if ($this->data->getActive() === 'false') {
            return false;
        }

        throw new \Exception('Incorrect Data');
    }

    public function getValue()
    {
        if (is_numeric($this->data->getValue())) {
            return $this->data->getValue();
        }

        throw new \Exception('Incorrect Data');
    }
}