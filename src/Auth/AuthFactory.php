<?php

namespace App\Auth;

use Zend\ServiceManager\ServiceLocatorInterface;

class AuthFactory
{
    public function __invoke(ServiceLocatorInterface $services)
    {
        // force session_start()
        $services->get(\Aura\Session\Session::class);

        $authSession = new \Aura\Auth\Session\Session($_COOKIE);

        $authFactory = new \Aura\Auth\AuthFactory($_COOKIE, $authSession);
        return $authFactory->newInstance();
    }
}
