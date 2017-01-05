# Components

* zendframework/zend-servicemanager
* zendframework/zend-diactoros
* aura/router
* aura/session
* aura/auth
* doctrine/orm
* ramsey/uuid
* beberlei/assert
* twig/twig
* relay/relay

# Config directory

## config.php

Configuracion general de la app (base de datos, cache dir, etc), accesible en service manager con get(\App\Config\Config::class)

## routes.php

Configuracion de las rutas del sitio

## services.php

Configuracion de los demas services necesarios

# Dependency Injection

Por default se usa https://zendframework.github.io/zend-servicemanager/reflection-abstract-factory/

# Doctrine ORM

`.\vendor\bin\doctrine orm:schema-tool:update --force`