<?php

namespace App\Doctrine;

use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\ORM\EntityManager;

class FinderFactory
{
    public function __invoke(ServiceLocatorInterface $serviceManager)
    {
        return new Finder($serviceManager->get(EntityManager::class));
    }
}
