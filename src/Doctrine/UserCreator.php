<?php

namespace App\Doctrine;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Assert\Assertion;

class UserCreator {

    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create($name, $email, $password) {

        Assertion::notEmpty($name, 'Completa tu nombre.');
        Assertion::notEmpty($email, 'Completa tu email.');
        Assertion::notEmpty($password, 'Ingresa un password.');
        Assertion::email($email, 'El email ingresado no es válido');

        $user = (new User)
            ->setName($name)
            ->setEmail($email)
            ->setPassword(password_hash($password, PASSWORD_BCRYPT))
            ->setCreatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

}