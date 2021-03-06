<?php

namespace App\Action\Login;

use App\Action\ActionTrait;
use Aura\Auth\Auth;
use Aura\Session\Segment;
use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;

final class Get {

    use ActionTrait;

    private $twigResponse;
    private $auth;
    private $segment;

    public function __construct(TwigResponse $twigResponse, Auth $auth, Segment $segment) {
        $this->twigResponse = $twigResponse;
        $this->auth = $auth;
        $this->segment = $segment;
    }

    public function index(ServerRequest $request) {

        if ($this->auth->isValid()) {
            return $this->redirect('/');
        }

        $vars = ['error' => $this->segment->getFlash('error')];

        return $this->twigResponse->render('login.twig', $vars);
    }

}