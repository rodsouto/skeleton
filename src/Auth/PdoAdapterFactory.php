<?php

namespace App\Auth;

use Aura\Auth\Verifier\PasswordVerifier;
use Aura\Auth\Adapter\PdoAdapter;

class PdoAdapterFactory
{
    public function __invoke($services)
    {
        $cols = [
            'users.email', // username
            'users.password', // password
            'users.id',
            'users.name',
        ];

        $from = 'users';

        $verifier = new PasswordVerifier(PASSWORD_BCRYPT);

        $pdoConnection = $services->get(\Doctrine\ORM\EntityManager::class)->getConnection()->getWrappedConnection();

        $pdoAdapter = new PdoAdapter($pdoConnection, $verifier, $cols, $from);

        return $pdoAdapter;
    }
}
