<?php

namespace App\Response;

class TwigResponseFactory
{
    public function __invoke($services)
    {
        return new TwigResponse($services->get('TwigEnvironment'));
    }
}
