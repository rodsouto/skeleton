<?php

return [
    'abstract_factories' => [
        Zend\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory::class,
    ],
    'factories' => [

        App\Config\Config::class => App\Config\ConfigFactory::class,

        Aura\Router\RouterContainer::class => App\Router\RouterFactory::class,
        Aura\Router\Generator::class => App\Router\GeneratorFactory::class,

        Twig_Environment::class => App\Twig\TwigFactory::class,

        Aura\Auth\Auth::class => App\Auth\AuthFactory::class,
        Aura\Auth\Service\LoginService::class => App\Auth\LoginServiceFactory::class,
        Aura\Auth\Service\LogoutService::class => App\Auth\LogoutServiceFactory::class,
        Aura\Auth\Adapter\PdoAdapter::class => App\Auth\PdoAdapterFactory::class,

        Aura\Session\Session::class => App\Session\SessionFactory::class,
        Aura\Session\Segment::class => App\Session\SegmentFactory::class,

        Doctrine\ORM\EntityManager::class => App\Doctrine\EntityManagerFactory::class,
    ]

];