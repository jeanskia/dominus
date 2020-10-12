<?php

namespace Framework\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of RoutePrefixeMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class RoutePrefixeMiddleware implements MiddlewareInterface
{

    /**
     * @var string
     */
    private $prefixe;

    /**
     * @var string
     */
    private $middleware;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container, string $prefixe, string $middleware)
    {
        $this->container = $container;
        $this->middleware = $middleware;
        $this->prefixe = $prefixe;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        $path = $request->getUri()->getPath();
        if (strpos($path, $this->prefixe) === 0) {
            return $this->container->get($this->middleware)->process($request, $delegate);
        }
        return $delegate->process($request);
    }
}
