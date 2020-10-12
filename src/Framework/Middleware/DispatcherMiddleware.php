<?php

namespace Framework\Middleware;

use Exception;
use GuzzleHttp\Psr7\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

;

/**
 * Description of DispatcherMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class DispatcherMiddleware
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        
        $this->container = $container;
    }
    
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        $route = $request->getAttribute(\Framework\Router\Route::class);
        if (is_null($route)) {
            return $next($request);
        }
        $callback = $route->getCallBack();
        if (is_string($callback)) {
            $callback = $this->container->get($callback);
        }
        $response = call_user_func_array($callback, [$request]);
        if (is_string($response)) {
            return new Response(200, [], $response);
        } elseif ($response instanceof \Psr\Http\Message\ResponseInterface) {
            return $response;
        } else {
            throw new Exception('The response is not a string or an instance of ResponseInterface');
        }
    }
}
