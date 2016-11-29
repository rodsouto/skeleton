<?php

namespace App\Config;

class ConfigFactory
{
    public function __invoke()
    {
        return new Config(include __DIR__ . '/../../config/config.php');
    }
}
