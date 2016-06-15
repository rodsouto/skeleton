<?php

namespace App\Router;

use Aura\Router\RouterContainer;

class RouterFactory
{
    public function __invoke()
    {
        $routerContainer = new RouterContainer();

        $map = $routerContainer->getMap();

        foreach(include __DIR__ . '/../../config/routes.php' as $routeName => $routeConfig) {

            $route = $map->route($routeName, $routeConfig['path'], $routeConfig['handler']);

            if (isset($routeConfig['method'])) {
                $route->allows($routeConfig['method']);
            }

            if (isset($routeConfig['tokens'])) {
                $route->tokens($routeConfig['tokens']);
            }

        }

        return $routerContainer;
    }
}
