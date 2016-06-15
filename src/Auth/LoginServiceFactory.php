<?php

namespace App\Auth;

class LoginServiceFactory
{
    public function __invoke($services)
    {
        $authFactory = new \Aura\Auth\AuthFactory($_COOKIE);
        return $authFactory->newLoginService($services->get(\Aura\Auth\Adapter\PdoAdapter::class));
    }
}
