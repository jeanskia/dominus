<?php

return [
    'auth.login'=>'/login',
    'twig.extensions'=> \DI\add([
        DI\get(App\Auth\AuthTwigExtension::class)
        ]),
        \Framework\Auth\User::class=> \DI\factory(function ($auth) {
            return $auth->getUser();
        })->parameter('auth', DI\get(\Framework\Auth::class)),
    \Framework\Auth::class => \DI\get(\App\Auth\DatabaseAuth::class),
    App\Auth\ForbiddenMiddleware::class => DI\object()->constructorParameter('loginPath', DI\get('auth.login'))
];
