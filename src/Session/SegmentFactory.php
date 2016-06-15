<?php

namespace App\Session;

class SegmentFactory
{
    public function __invoke($services)
    {
        $session = $services->get(\Aura\Session\Session::class);

        return $session->getSegment('AppSegment');
    }
}
