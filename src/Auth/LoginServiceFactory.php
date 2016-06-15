<?php

namespace App\Auth;

use Zend\ServiceManager\ServiceLocatorInterface;

class LoginServiceFactory
{
    public function __invoke(ServiceLocatorInterface $services)
    {
        $authFactory = new \Aura\Auth\AuthFactory($_COOKIE);
        return $authFactory->newLoginService($services->get(\Aura\Auth\Adapter\PdoAdapter::class));
    }
}
