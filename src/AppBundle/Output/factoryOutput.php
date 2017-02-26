<?php

namespace AppBundle\Output;

class factoryOutput
{
    /**
     * factoryOutput constructor.
     * @param $parameter
     */
    public function __construct($parameter = null)
    {
        $this->parameter = $parameter;
    }

    public function createObject()
    {
        if ($this->parameter) {
            return new fileOutput($this->parameter);
        }

        return new screenOutput();
    }
}