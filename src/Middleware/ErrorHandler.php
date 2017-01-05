<?php

namespace App\Middleware;

use App\Config\Config;
use App\Response\TwigResponse;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

class ErrorHandler {

    private $twigResponse;
    private $appConfig;

    public function __construct(TwigResponse $twigResponse, Config $appConfig) {
        $this->twigResponse = $twigResponse;
        $this->appConfig = $appConfig;
    }

    public function __invoke(ServerRequest $request, Response $response, callable $next) {
        try {
            $response = $next($request, $response);
        } catch (\Exception $e) {
            // TODO: log
            $vars = [
                'error' => '500 INTERNAL SERVER ERROR',
                'exception' => $e,
                'showException' => $this->appConfig->environment === 'development',
            ];

            $response = $this->twigResponse->render('error.twig', $vars);
        }

        return $response;
    }

}