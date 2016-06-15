<?php

$services = include __DIR__ . '/../config/init-services.php';

(new App\Dispatcher($services))->dispatch();