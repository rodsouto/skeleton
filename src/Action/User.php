<?php

namespace App\Action;

use Aura\Auth\Auth;
use Zend\Diactoros\ServerRequest;
use App\Response\TwigResponse;
use App\Doctrine\Finder;

final class User {

    private $twigResponse;
    private $finder;

    public function __construct(TwigResponse $twigResponse, Finder $finder) {
        $this->twigResponse = $twigResponse;
        $this->finder = $finder;
    }

    public function index(ServerRequest $request) {
        $entity = var_export($this->finder->find(\App\Entity\User::class, $request->getAttribute('routeParams')['id']), true);

        return $this->twigResponse->render('user.twig', ['entity' => $entity]);
    }

}