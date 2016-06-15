<?php

namespace App\Auth;

use Zend\ServiceManager\ServiceLocatorInterface;

class LogoutServiceFactory
{
    public function __invoke(ServiceLocatorInterface $services)
    {
        $authFactory = new \Aura\Auth\AuthFactory($_COOKIE);
        return $authFactory->newLogoutService($services->get(\Aura\Auth\Adapter\PdoAdapter::class));
    }
}
