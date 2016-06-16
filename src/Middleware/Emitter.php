<?php

namespace App\Middleware;

use Zend\Diactoros\Response;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequest;

class Emitter {

    public function __invoke(ServerRequest $request, Response $response, callable $next) {
        $response = $next($request, $response);

        (new SapiEmitter())->emit($response);

        return $response;
    }

}