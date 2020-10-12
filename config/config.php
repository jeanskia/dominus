<?php

use Framework\Middleware\CsrfMiddleware;
use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRendererFactory;
use Framework\Router;
use Framework\Router\RouterTwigExtension;
use Framework\Session\PHPSession;
use Framework\Session\SessionInterface;
use Framework\Twig\CsrfExtension;
use Framework\Twig\FlashExtension;
use Framework\Twig\FormatDateExtension;
use Framework\Twig\FormExtension;
use Framework\Twig\PagerFantaExtension;
use Psr\Container\ContainerInterface;
use function DI\factory;
use function DI\get;
use function DI\object;

return [
    'env'=> \DI\env('ENV','production'),
    'database.host'=>'localhost',
    'database.username'=>'root',
    'database.password'=>'',
    'database.name'=>'platform_ande',
    'views.path' => dirname(__DIR__).'/views',
    'twig.extensions'=>[
        get(RouterTwigExtension::class),
        get(PagerFantaExtension::class),
        get(FlashExtension::class),
        get(FormExtension::class),
        get(CsrfExtension::class),
        get(FormatDateExtension::class)
    ],
    SessionInterface::class=> object(PHPSession::class),
    CsrfMiddleware::class => object()->constructor(get(SessionInterface::class)),
    Router::class => factory(Router\RouterFactory::class),
    RendererInterface::class => factory (TwigRendererFactory::class),
    PDO::class=>function(ContainerInterface $c){
        return new PDO('mysql:host='.$c->get('database.host').'; dbname='.$c->get('database.name'), 
                        $c->get('database.username'),
                        $c->get('database.password'),
                        [
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\'',
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        ]
                );
    }
];

