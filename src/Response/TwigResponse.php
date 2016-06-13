<?php

namespace App\Response;

use Zend\Diactoros\Response\HtmlResponse;
use Twig_Environment;

final class TwigResponse {

    private $twig;

    public function __construct(Twig_Environment $twig) {
        $this->twig = $twig;
    }

    public function render($template, array $vars = []) {
        $html = $this->twig->render($template, $vars);

        return new HtmlResponse($html);
    }

}