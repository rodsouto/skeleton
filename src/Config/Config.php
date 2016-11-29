<?php

namespace App\Config;

final class Config {

    public $environment;
    public $cache_dir;
    public $twig;
    public $doctrine;
    public $db;

    public function __construct(array $config) {
        foreach($config as $key => $value) {
            $this->$key = $value;
        }
    }

}