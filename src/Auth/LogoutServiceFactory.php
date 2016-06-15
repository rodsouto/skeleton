<?php

namespace App\Auth;

class LogoutServiceFactory
{
    public function __invoke($services)
    {
        $authFactory = new \Aura\Auth\AuthFactory($_COOKIE);
        return $authFactory->newLogoutService($services->get(\Aura\Auth\Adapter\PdoAdapter::class));
    }
}
