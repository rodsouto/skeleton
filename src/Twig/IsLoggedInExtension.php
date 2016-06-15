<?php

namespace App\Twig;

use Aura\Auth\Auth;
use Twig_Extension;

class IsLoggedInExtension extends Twig_Extension
{

    private $auth;

    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }

    public function getName()
    {
        return 'isLoggedIn';
    }

    public function getFunctions()
    {
        return [
            'isLoggedIn' => new \Twig_SimpleFunction('isLoggedIn', [$this->auth, 'isValid'])
        ];
    }
}