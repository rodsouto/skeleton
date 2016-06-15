<?php

namespace App\Twig;

class RouteExtensionFactory
{
    public function __invoke(\Zend\ServiceManager\ServiceManager $services)
    {
        return new RouteExtension($services->get(\Aura\Router\RouterContainer::class));
    }
}
