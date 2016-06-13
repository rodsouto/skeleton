<?php

namespace App\Twig;

class TwigFactory
{
    public function __invoke(\Zend\ServiceManager\ServiceManager $services)
    {
        $config = $services->get('Config');
        $loader = new \Twig_Loader_Filesystem($config['twig']['dir']);

        $twig = new \Twig_Environment($loader, array(
            //'cache' => $config['twig']['cache_dir'],
        ));
        
        return $twig;
    }
}
