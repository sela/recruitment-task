<?php
/**
 * Created by PhpStorm.
 * User: selayair
 * Date: 26/02/2017
 * Time: 13:16
 */

namespace AppBundle\Output;

interface outputInterface
{
    public function __construct($parameters);

    public function write($text);
}