<?php

namespace App\Session;

class SessionFactory
{
    public function __invoke()
    {
        $session = (new \Aura\Session\SessionFactory)->newInstance($_COOKIE);

        $session->start();

        return $session;
    }
}
