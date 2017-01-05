<?php

namespace App\Router;

use Aura\Router\RouterContainer;

class GeneratorFactory
{
    public function __invoke($services)
    {
        return $services->get(RouterContainer::class)->getGenerator();
    }
}
