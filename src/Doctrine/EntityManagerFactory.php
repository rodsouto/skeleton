<?php

namespace App\Doctrine;

use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class EntityManagerFactory
{
    public function __invoke(ServiceLocatorInterface $services)
    {
        $config = $services->get('Config');

        $isDevMode = isset($config['environment']) && $config['environment'] == 'development';

        // TODO
        $cacheDriver = null;

        $ormConfig = Setup::createAnnotationMetadataConfiguration($config['doctrine']['entity_dir'], $isDevMode, $config['cache_dir'], $cacheDriver, false);

        if (isset($config['default_repository'])) {
            $ormConfig->setDefaultRepositoryClassName($config['default_repository']);
        }
        
        if ($isDevMode) {
            $ormConfig->setAutoGenerateProxyClasses(true);
        } else {
            $ormConfig->setAutoGenerateProxyClasses(false);
        }

        if (!empty($config['doctrine']['logger'])) {
            $logger = new \Doctrine\DBAL\Logging\DebugStack;
            $ormConfig->setSQLLogger($logger);
        }

        $conn = [
            'dbname' => $config['db']['dbname'],
            'user' => $config['db']['user'],
            'password' => $config['db']['password'],
            'host' => $config['db']['host'],
            'driver' => 'pdo_mysql',
            'charset' => 'utf8',
            'driverOptions' => [
                1002 => 'SET NAMES utf8'
            ]
        ];

        return EntityManager::create($conn, $ormConfig);
    }
}
