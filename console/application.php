#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use AppBundle\Command\ParseCommand;

$application = new Application();

$application->add(new ParseCommand());

$application->run();
