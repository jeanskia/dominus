<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$app = (new Framework\app('config/config.php'))
        ->addModule(\App\Admin\AdminModule::class)
        ->addModule(\App\Platform\PlatformModule::class)
        ->addModule(\App\Mission\MissionModule::class)
        ->addModule(\App\Auth\AuthModule::class);

$container = $app->getContainer();
   $app ->pipe(Middlewares\Whoops::class)
        ->pipe(Framework\Middleware\TrailingSlashMiddleware::class)
        ->pipe(App\Auth\ForbiddenMiddleware::class)
        ->pipe($container->get('admin.prefix'), \Framework\Auth\LoggedInMiddleware::class)
        ->pipe(\Framework\Middleware\MethodMiddleware::class)
        ->pipe(\Framework\Middleware\CsrfMiddleware::class)
        ->pipe(Framework\Middleware\RouterMiddleware::class)
        ->pipe(Framework\Middleware\DispatcherMiddleware::class)
        ->pipe(Framework\Middleware\NotFoundMiddleware::class);

if (php_sapi_name() !== "cli") {
  //  throw new Exception();
    $response = $app->run(GuzzleHttp\Psr7\ServerRequest::fromGlobals());
    \Http\Response\send($response);
}
