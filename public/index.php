<?php

use Relay\RelayBuilder;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response;
use Psr7Middlewares\Middleware;

$services = include __DIR__ . '/../config/init-services.php';

$resolver = function ($class) use ($services) {
    if (!is_string($class)) {
        return $class;
    }

    return $services->get($class);
};

// middleware queue
$queue = [
    App\Middleware\Emitter::class,

    App\Middleware\ErrorHandler::class,

    new App\Middleware\Router($services),
];

$relay = (new RelayBuilder($resolver))->newInstance($queue);

$request = ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$relay($request, new Response);