<?php

$config = [

    'factories' => [

        'Config' => App\Config\ConfigFactory::class,

        'App\Router' => App\Router\RouterFactory::class,

        \App\Response\TwigResponse::class => App\Response\TwigResponseFactory::class,

        'TwigEnvironment' => App\Twig\TwigFactory::class,

        Aura\Auth\Auth::class => App\Auth\AuthFactory::class,
        Aura\Auth\Service\LoginService::class => App\Auth\LoginServiceFactory::class,
        Aura\Auth\Service\LogoutService::class => App\Auth\LogoutServiceFactory::class,
        Aura\Auth\Adapter\PdoAdapter::class => App\Auth\PdoAdapterFactory::class,

        Aura\Session\Session::class => App\Session\SessionFactory::class,
        Aura\Session\Segment::class => App\Session\SegmentFactory::class,

        Doctrine\ORM\EntityManager::class => App\Doctrine\EntityManagerFactory::class,
    ]

];

return array_merge_recursive($config, include __DIR__ . '/actions.php');