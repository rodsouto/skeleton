<?php

namespace App;

use Aura\Router\RouterContainer;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;
use Zend\ServiceManager\ServiceManager;

class Dispatcher {

    private $serviceManager;

    public function __construct(ServiceManager $serviceManager) {
        $this->serviceManager = $serviceManager;
    }

    public function dispatch() {

        $matcher = $this->serviceManager->get(RouterContainer::class)->getMatcher();

        $request = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );

        $route = $matcher->match($request);

        $emiter = new SapiEmitter();

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


        $emiter->emit($response);
    }

}