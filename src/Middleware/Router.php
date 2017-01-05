<?php

namespace App\Middleware;

use Aura\Router\RouterContainer;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zend\ServiceManager\ServiceManager;

class Router {

    private $serviceManager;

    public function __construct(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    public function __invoke(ServerRequest $request, Response $response, callable $next) {

        /** @var \Aura\Router\Matcher $matcher */
        $matcher = $this->serviceManager->get(RouterContainer::class)->getMatcher();

        $route = $matcher->match($request);

        if ($route) {

            $request = $request->withAttribute('routeParams', $route->attributes);

            $controller = $this->serviceManager->get($route->handler[0]);
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
            $response = $this->serviceManager->get(\App\Action\Error::class)->error($request, $matcher->getFailedRoute());
        }

        return $next($request, $response);
    }

}