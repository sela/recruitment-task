<?php
namespace AppBundle\Data;

class YML implements DataInterface
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

        return $this->data->getActive();
    }

    public function getValue()
    {
        if (is_numeric($this->data->getValue())) {
            return $this->data->getValue();
        }

        throw new \Exception('Incorrect Data');
    }
}