<?php

namespace App;

use Interop\Container\ContainerInterface;
use ReflectionClass;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class AbstractFactory implements AbstractFactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Construct a new ReflectionClass object for the requested action
        $reflection = new ReflectionClass($requestedName);
        // Get the constructor
        $constructor = $reflection->getConstructor();
        if (is_null($constructor)) {
            // There is no constructor, just return a new class
            return new $requestedName;
        }

        // Get the parameters
        $parameters = $constructor->getParameters();
        $dependencies = [];
        foreach ($parameters as $parameter) {
            // Get the parameter class
            $class = $parameter->getClass();
            // Get the class from the container
            $dependencies[] = $container->get($class->getName());
        }

        // Return the requested class and inject its dependencies
        return $reflection->newInstanceArgs($dependencies);
    }

    public function canCreate(ContainerInterface $container, $requestedName)
    {
        // Only accept App classes
        if (substr($requestedName, 0, 4) == 'App\\') {
            return true;
        }

        return false;
    }
}