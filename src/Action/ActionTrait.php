<?php

namespace App\Action;

trait ActionTrait {

    public function redirect($uri, $status = 302, array $headers = []) {
        return new \Zend\Diactoros\Response\RedirectResponse($uri, $status, $headers);
    }

}