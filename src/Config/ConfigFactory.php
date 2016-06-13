<?php

namespace App\Config;

class ConfigFactory
{
    public function __invoke()
    {
        return include __DIR__ . '/../../config/config.php';
    }
}
