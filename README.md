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

# Config directory

## config.php

Configuracion general de la app (base de datos, cache dir, etc), accesible en service manager con get('Config')

## routes.php

Configuracion de las rutas del sitio

## services.php

Configuracion de los demas services necesarios

# Dependency Injection

App\AbstractFactory inyecta automaticamente todas las dependencias a las clases que estan dentro del namespace App, para esto en el service manager cada clase tiene que estar registrada con su FQCL (Class::class)

# Doctrine ORM

`.\vendor\bin\doctrine orm:schema-tool:update --force`