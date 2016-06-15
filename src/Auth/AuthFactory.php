<?php

namespace App\Auth;

class AuthFactory
{
    public function __invoke($services)
    {
        // force session_start()
        $services->get(\Aura\Session\Session::class);

        $authSession = new \Aura\Auth\Session\Session($_COOKIE);

        $authFactory = new \Aura\Auth\AuthFactory($_COOKIE, $authSession);
        return $authFactory->newInstance();
    }
}
