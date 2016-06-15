<?php

include __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

mb_internal_encoding('UTF-8');

mb_http_output('UTF-8');

use Zend\ServiceManager\ServiceManager;

$services = new ServiceManager(include __DIR__ . '/services.php');

return $services;