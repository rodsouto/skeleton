<?php

namespace App\Action;

use App\Response\TwigResponse;

interface TwigActionInterface {

    public function __construct(TwigResponse $twigResponse);
    
}