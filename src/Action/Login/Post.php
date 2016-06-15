<?php

namespace App\Action\Login;

use Aura\Session\Segment;
use Zend\Diactoros\ServerRequest;
use Aura\Auth\Auth;
use Aura\Auth\Service\LoginService;
use App\Action\ActionTrait;

final class Post {

    use ActionTrait;

    private $auth;
    private $loginService;
    private $segment;

    public function __construct(Auth $auth, LoginService $loginService, Segment $segment) {
        $this->auth = $auth;
        $this->loginService = $loginService;
        $this->segment = $segment;
    }

    public function index(ServerRequest $request) {

        if ($this->auth->isValid()) {
            return $this->redirect('/');
        }

        $post = $request->getParsedBody();

        try {
            $this->loginService->login($this->auth, array(
                'username' => trim($post['email']),
                'password' => trim($post['password'])
            ));
        } catch(\Exception $e) {

            switch(true) {
                case $e instanceof \Aura\Auth\Exception\UsernameMissing:
                case $e instanceof \Aura\Auth\Exception\PasswordMissing:
                case $e instanceof \Aura\Auth\Exception\UsernameNotFound:
                case $e instanceof \Aura\Auth\Exception\PasswordIncorrect:
                    $error = 'Los datos de ingreso son incorrectos.';
                    break;
                default:
                    /* TODO: log error */
                    $error = 'Ocurrió un error inesperado';
                break;
            }

            $this->segment->setFlash('error', $error);
            return $this->redirect('/login');
        }

        return $this->redirect('/');
    }

}