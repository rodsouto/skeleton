<?php

namespace App\Middleware;

use App\Response\TwigResponse;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

class ErrorHandler {

    private $twigResponse;

    public function __construct(TwigResponse $twigResponse) {
        $this->twigResponse = $twigResponse;
    }

    public function __invoke(ServerRequest $request, Response $response, callable $next) {
        try {
            $response = $next($request, $response);
        } catch (\Exception $e) {
            // TODO: log
            $response = $this->twigResponse->render('error.twig', ['error' => '500 INTERNAL SERVER ERROR']);
        }

        return $response;
    }

}