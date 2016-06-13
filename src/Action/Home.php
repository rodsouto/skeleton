<?php

namespace App\Action;

use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;

final class Home implements TwigActionInterface {

    private $twigResponse;

    public function __construct(TwigResponse $twigResponse) {
        $this->twigResponse = $twigResponse;
    }

    public function index(ServerRequest $request) {

        return $this->twigResponse->render('home.twig');
    }

}