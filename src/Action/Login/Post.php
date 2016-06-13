<?php

namespace App\Action\Login;

use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;
use App\Action\TwigActionInterface;

final class Post implements TwigActionInterface {

    private $twigResponse;

    public function __construct(TwigResponse $twigResponse) {
        $this->twigResponse = $twigResponse;
    }

    public function index(ServerRequest $request) {

        return $this->twigResponse->render('login.twig');
    }

}