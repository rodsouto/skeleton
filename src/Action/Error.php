<?php

namespace App\Action;

use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;

final class Error implements TwigActionInterface {

    private $twigResponse;

    public function __construct(TwigResponse $twigResponse) {
        $this->twigResponse = $twigResponse;
    }

    public function index(ServerRequest $request) {

        return $this->twigResponse->render('error.twig');
    }

}