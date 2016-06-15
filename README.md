# Config directory

## config.php

Configuracion general de la app (base de datos, cache dir, etc), accesible en service manager con get('Config')

## routes.php

Configuracion de las rutas del sitio

## services.php

Configuracion de los demas services necesarios

# Actions

El abstract factory App\Action\AbstractActionFactory inyecta automaticamente todas las dependencias, para esto en el service manager cada clase tiene que estar registrada con su FQCL (Class::class)