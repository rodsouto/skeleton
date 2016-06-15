<?php

namespace App\Session;

use Zend\ServiceManager\ServiceLocatorInterface;

class SegmentFactory
{
    public function __invoke(ServiceLocatorInterface $services)
    {
        $session = $services->get(\Aura\Session\Session::class);

        return $session->getSegment('AppSegment');
    }
}
