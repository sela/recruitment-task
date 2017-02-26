<?php

namespace AppBundle\Output;

class fileOutput implements outputInterface
{
    private $file;

    public function __construct($parameters = null)
    {
        $this->file = fopen($parameters, "w") or die("Unable to open file!");
    }

    public function write($text)
    {
        fwrite($this->file, $text);
    }

    function __destruct()
    {
        fclose($this->file);
    }
}