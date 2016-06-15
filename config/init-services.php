<?php

include __DIR__ . '/../vendor/autoload.php';

use Zend\ServiceManager\ServiceManager;

$services = new ServiceManager(include __DIR__ . '/services.php');

return $services;