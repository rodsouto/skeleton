<?php

return [

    'home' => ['method' => 'GET', 'path' => '/', 'handler' => [App\Action\Home::class, 'index']],

    'login' => ['method' => 'GET', 'path' => '/login', 'handler' => [App\Action\Login\Get::class, 'index']],
    'login-post' => ['method' => 'POST', 'path' => '/login', 'handler' => [App\Action\Login\Post::class, 'index']],

    'logout' => ['method' => 'GET', 'path' => '/logout', 'handler' => [App\Action\Logout::class, 'index']],

    'register' => ['method' => 'GET', 'path' => '/register', 'handler' => [App\Action\Register\Get::class, 'index']],
    'register-post' => ['method' => 'POST', 'path' => '/register', 'handler' => [App\Action\Register\Post::class, 'index']],

    'user' => ['method' => 'GET', 'path' => '/user/{id}', 'handler' => [App\Action\User::class, 'index']],

];