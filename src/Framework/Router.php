<?php

namespace Framework;

use Framework\Router\Route;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route as ZendRoute;

/**
 * Enregistre et trouve la route correspondante à la requête
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class Router
{
    /**
     *
     * @var FastRouteRouter
     */
    private $router;


    public function __construct(string $cache = null)
    {
        $this->router = new FastRouteRouter(null, null, [
            FastRouteRouter::CONFIG_CACHE_ENABLED => !is_null($cache),
            FastRouteRouter::CONFIG_CACHE_FILE =>$cache
        ]) ;
    }

     /**
     *
     * @param string $path
     * @param string|callable $callable
     * @param string $name
     */
    public function get(string $path, $callable, string $name)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ['GET'], $name));
    }
     /**
     *
     * @param string $path
     * @param string|callable $callable
     * @param string $name
     */
    public function post(string $path, $callable, string $name = null)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ['POST'], $name));
    }
    /**
     *
     * @param string $path
     * @param string|callable $callable
     * @param string $name
     */
    public function delete(string $path, $callable, string $name = null)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ['DELETE'], $name));
    }
    /**
     * Génère les routes du GRUD
     * @param string $prefixPath
     * @param type $callable
     * @param string $prefixName
     */
    public function crud(string $prefixPath, $callable, string $prefixName)
    {
        
            $this->get("$prefixPath", $callable, "$prefixName.index");
            $this->get("$prefixPath/new", $callable, "$prefixName.create");
            $this->post("$prefixPath/new", $callable);
            $this->get("$prefixPath/{id:\d+}", $callable, "$prefixName.edit");
            $this->post("$prefixPath/{id:\d+}", $callable);
            $this->delete("$prefixPath/{id:\d+}", $callable, "$prefixName.delete");
    }

    /**
     *
     * @param ServerRequestInterface $request
     * @return Route|null
     */
    public function match(ServerRequestInterface $request)
    {
        $result = $this->router->match($request);
        
        if ($result->isSuccess()) {
            return new Route(
                $result->getMatchedRouteName(),
                $result->getMatchedMiddleware(),
                $result->getMatchedParams()
            );
        }
        return null;
    }
    
    public function generateUri(string $name, array $params = [], array $queryParams = []): string
    {
        $uri = $this->router->generateUri($name, $params);
        if (!empty($queryParams)) {
            return $uri.'?'. http_build_query($queryParams);
        }
        return $uri;
    }
}
