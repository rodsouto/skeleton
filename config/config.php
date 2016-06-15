<?php

return [
    'environment' => 'development',
    'cache_dir' => __DIR__.'/../cache',
    'twig' => [
        'dir' => __DIR__.'/../views'
    ],
    'doctrine' => [
        'entity_dir' => [__DIR__.'/../src/Entity'],
    ],
    'db' => [
        'dbname' => 'skeleton',
        'user' => 'root',
        'password' => '',
        'host' => 'localhost',
    ],
];