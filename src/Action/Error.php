<?php

namespace App\Action;

use Aura\Router\Route;
use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;

final class Error {

    private $twigResponse;

    public function __construct(TwigResponse $twigResponse) {
        $this->twigResponse = $twigResponse;
    }

    public function error(ServerRequest $request, Route $failedRoute) {

        switch ($failedRoute->failedRule) {
            case 'Aura\Router\Rule\Allows':
                // Send the $failedRoute->allows as 'Allow:'
                $error = '405 METHOD NOT ALLOWED';
                break;
            case 'Aura\Router\Rule\Accepts':
                $error = '406 NOT ACCEPTABLE';
                break;
            default:
                $error = '404 NOT FOUND';
                break;
        }

        return $this->twigResponse->render('error.twig', ['error' => $error]);
    }

}