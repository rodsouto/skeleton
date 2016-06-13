<?php

$config = [

    'factories' => [

        'Config' => \App\Config\ConfigFactory::class,

        'App\Router' => \App\Router\RouterFactory::class,

        \App\Response\TwigResponse::class => \App\Response\TwigResponseFactory::class,

        'TwigEnvironment' => \App\Twig\TwigFactory::class,

        // factory para db
        // factory para auth service
        // etc
    ]

];

return array_merge_recursive($config, include __DIR__ . '/actions.php');