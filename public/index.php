<?php

$services = include __DIR__ . '/../config/init-services.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/** @var \Aura\Router\RouterContainer $router */
$router = $services->get(Aura\Router\RouterContainer::class);

$matcher = $router->getMatcher();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$route = $matcher->match($request);

$emiter = new \Zend\Diactoros\Response\SapiEmitter();

if ($route) {

    $request = $request->withAttribute('routeParams', $route->attributes);

    $controller = $services->get($route->handler[0]);
    $method = $route->handler[1];

    $response = $controller->$method($request);

    switch (true) {
        case is_string($response):
            $response = new \Zend\Diactoros\Response\HtmlResponse($response);
        break;
        case is_array($response):
            $response = new \Zend\Diactoros\Response\JsonResponse($response);
        break;
    }

} else {
    // get the first of the best-available non-matched routes
    $failedRoute = $matcher->getFailedRoute();

    // which matching rule failed?
    /*switch ($failedRoute->failedRule) {
        case 'Aura\Router\Rule\Allows':
            // 405 METHOD NOT ALLOWED
            // Send the $failedRoute->allows as 'Allow:'
            break;
        case 'Aura\Router\Rule\Accepts':
            // 406 NOT ACCEPTABLE
            break;
        default:
            // 404 NOT FOUND
            break;
    }*/

    // mostramos todos los errores como 404
    $response = $services->get(App\Action\Error::class)->index($request);
}


$emiter->emit($response);