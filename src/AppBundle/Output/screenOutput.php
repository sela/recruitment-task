<?php

namespace AppBundle\Output;

class screenOutput implements outputInterface
{
    public function __construct($parameters = null)
    {
    }

    public function write($text)
    {
        echo $text;
    }
}