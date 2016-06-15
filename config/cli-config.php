<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\EntityManager;

$services = include 'init-services.php';

return ConsoleRunner::createHelperSet($services->get(EntityManager::class));