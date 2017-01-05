<?php

namespace App\Twig;

use Aura\Router\Generator;
use Twig_Extension;

class RouteExtension extends Twig_Extension
{

    private $route;

    public function __construct(Generator $route) {
        $this->route = $route;
    }

    public function getName()
    {
        return 'route';
    }

    public function getFunctions()
    {
        return [
            'route' => new \Twig_SimpleFunction('route', [$this->route, 'generate'])
        ];
    }
}