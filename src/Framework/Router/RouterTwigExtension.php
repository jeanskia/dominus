<?php

namespace Framework\Router;

use Framework\Router;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Description of RouterTwigExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class RouterTwigExtension extends Twig_Extension
{
    
    private $router;
    
    public function __construct(Router $router)
    {
        $this->router = $router ;
    }
    
    public function getFunctions()
    {
        return [
          new Twig_SimpleFunction('path', [$this,'pathFor']),
          new Twig_SimpleFunction('is_subpath', [$this,'isSubPath']),
        ];
    }
    
    public function pathFor(string $path, array $params = []):string
    {
        return $this->router->generateUri($path, $params)   ;
    }
    
    public function isSubPath(string $path, $parameters = [])
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/' ;
        $expectedUri = $this->router->generateUri($path, $parameters);
        return strpos($uri, $expectedUri) !== false;
    }
}
