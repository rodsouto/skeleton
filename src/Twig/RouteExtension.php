<?php

namespace App\Twig;

use Twig_Extension;
use Aura\Router\RouterContainer;

class RouteExtension extends Twig_Extension
{

    private $routerContainer;

    public function __construct(RouterContainer $routerContainer) {
        $this->routerContainer = $routerContainer;
    }

    public function getName()
    {
        return 'route';
    }

    public function getFunctions()
    {
        $generator = $this->routerContainer->getGenerator();

        return [
            'route' => new \Twig_SimpleFunction('route', [$generator, 'generate'])
        ];
    }
}