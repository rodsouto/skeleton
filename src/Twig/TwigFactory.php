<?php

namespace App\Twig;

use Zend\ServiceManager\ServiceLocatorInterface;

class TwigFactory
{
    public function __invoke(ServiceLocatorInterface $services)
    {
        $config = $services->get('Config');
        $loader = new \Twig_Loader_Filesystem($config['twig']['dir']);

        $twig = new \Twig_Environment($loader, array(
            //'cache' => $config['twig']['cache_dir'],
        ));

        $twig->addExtension($services->get(RouteExtension::class));
        $twig->addExtension($services->get(IsLoggedInExtension::class));
        
        return $twig;
    }
}
