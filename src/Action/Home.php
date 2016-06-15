<?php

namespace App\Action;

use Aura\Auth\Auth;
use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;
use App\Doctrine\Finder;

final class Home {

    private $twigResponse;
    private $auth;

    public function __construct(TwigResponse $twigResponse, Auth $auth) {
        $this->twigResponse = $twigResponse;
        $this->auth = $auth;
    }

    public function index(ServerRequest $request) {

        $userData = $this->auth->getUserData();

        return $this->twigResponse->render('home.twig', ['user' => $userData]);
    }

}