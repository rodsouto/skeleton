<?php

namespace App\Action\Register;

use App\Doctrine\UserCreator;
use Assert\AssertionFailedException;
use Aura\Session\Segment;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Zend\Diactoros\ServerRequest;
use Aura\Auth\Auth;
use App\Action\ActionTrait;

final class Post {

    use ActionTrait;

    private $auth;
    private $userCreator;
    private $segment;

    public function __construct(Auth $auth, UserCreator $userCreator, Segment $segment) {
        $this->auth = $auth;
        $this->userCreator = $userCreator;
        $this->segment = $segment;
    }

    public function index(ServerRequest $request) {

        if ($this->auth->isValid()) {
            return $this->redirect('/');
        }

        $post = $request->getParsedBody();

        try {
            $this->userCreator->create($post['name'], $post['email'], $post['password']);
        } catch (AssertionFailedException $e) {
            $this->segment->setFlash('error', $e->getMessage());
            $this->segment->setFlash('data', $post);

            return $this->redirect('/register');
        } catch (UniqueConstraintViolationException $e) {
            $this->segment->setFlash('error', 'Ya existe un usuario con ese email');
            $this->segment->setFlash('data', $post);

            return $this->redirect('/register');
        } catch (\Exception $e) {
            // TODO: log
            $this->segment->setFlash('error', 'Ocurrió un error inesperado.');
            $this->segment->setFlash('data', $post);

            return $this->redirect('/register');
        }

        return $this->redirect('/');
    }

}