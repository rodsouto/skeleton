<?php

namespace App\Doctrine;

use Doctrine\ORM\EntityManager;

class Finder {

    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function find($entityClass, $id) {
        $repository = $this->entityManager->getRepository($entityClass);

        return $repository->find($id);
    }

}