<?php

namespace App\Action;

use Aura\Auth\Auth;
use Aura\Auth\Service\LogoutService;
use Zend\Diactoros\ServerRequest;

final class Logout {

    use ActionTrait;

    private $auth;
    private $logoutService;

    public function __construct(Auth $auth, LogoutService $logoutService) {
        $this->auth = $auth;
        $this->logoutService = $logoutService;
    }

    public function index(ServerRequest $request) {
        $this->logoutService->logout($this->auth);

        return $this->redirect('/');
    }

}