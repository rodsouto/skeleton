<?php

namespace App\Action;

use Aura\Auth\Auth;
use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;
use App\Doctrine\Finder;

final class Home {

    private $twigResponse;
    private $auth;
    private $finder;

    public function __construct(TwigResponse $twigResponse, Auth $auth, Finder $finder) {
        $this->twigResponse = $twigResponse;
        $this->auth = $auth;
        $this->finder = $finder;
    }

    public function index(ServerRequest $request) {

        $userData = $this->auth->getUserData();

        $entity = $userData ? var_export($this->finder->find(\App\Entity\User::class, $userData['id']), true) : false;

        return $this->twigResponse->render('home.twig', ['user' => $userData, 'entity' => $entity]);
    }

}