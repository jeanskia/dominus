<?php

namespace Framework;

use DI\ContainerBuilder;
use Doctrine\Common\Cache\FilesystemCache;
use Interop\Container\ContainerInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Réprésente le kernel l'application
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class App implements DelegateInterface, RequestHandlerInterface
{

    /**
     * @var string
     */
    private $definition;

    /**
     *liste of modules
     * @var array
     */
    private $module = [];
    /**
     * container
     * @var ContainerInterface
     */
    private $container;
    /**
     *
     * @var string []
     */
    private $middleware;
    /**
     *
     * @var int
     */
    private $index = 0;
    /**
     *
     * @param string $definition
     */
    public function __construct(string $definition)
    {
        $this->definition = $definition;
    }
    /**
     * Rajoute un module à l'application
     *
     * @param string $module
     * @return \self
     */
    public function addModule(string $module):self
    {
        $this->module [] = $module;
        return $this;
    }
    /**
     *
     * @param string $routeprefixe
     * @param string $middleware
     * @return \self
     */
     
    public function pipe(string $routeprefixe, string $middleware = null):self
    {
        if ($middleware === null) {
            $this->middleware[] = $routeprefixe;
        } else {
            $this->middleware[] = new Middleware\RoutePrefixeMiddleware($this->getContainer(), $routeprefixe, $middleware);
        }
        return $this;
    }
    
    public function process(ServerRequestInterface $request): ResponseInterface
    {
        $middleware =  $this->getMiddleware();
        if (is_null($middleware)) {
            throw new \Exception('aucun middleware n\'a intercepté cette requête');
        } elseif (is_callable($middleware)) {
            return call_user_func_array($middleware, [$request,[$this, 'process']]);
        } elseif ($middleware instanceof MiddlewareInterface) {
            return $middleware->process($request, $this);
        } // CsrfMiddleware n'est pas une instance de Psr\Http\Server\MiddlewareInterface
        elseif ($middleware instanceof \Interop\Http\ServerMiddleware\MiddlewareInterface) {
             return $middleware->process($request, $this);
        }
    }

    public function run(ServerRequestInterface $request): ResponseInterface
    {
        foreach ($this->module as $module) {
            $this->getContainer()->get($module);
        }
        return $this->process($request);
    }
    /**
     *
     * @return ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        if ($this->container === null) {
            $builder = new ContainerBuilder();
            $env = getenv('ENV') ?: 'production';
            if ($env === 'production') {
                $builder->setDefinitionCache(new FilesystemCache('tmp/di'));
                $builder->writeProxiesToFile(true, 'tmp/proxies');
            }
            $builder->addDefinitions($this->definition);
            foreach ($this->module as $module) {
                if ($module::DEFINITIONS) {
                    $builder->addDefinitions($module::DEFINITIONS);
                }
            }
            $this->container = $builder->build();
        }
         return $this->container;
    }
    /**
     * retourne la liste des modules
     *
     * @return array
     */
    public function getModules(): array
    {
        return $this->module;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->process($request);
    }
    
    private function getMiddleware()
    {
        if (array_key_exists($this->index, $this->middleware)) {
            if (is_string($this->middleware[$this->index])) {
                $middleware = $this->getContainer()->get($this->middleware[$this->index]);
            } else {
                $middleware = $this->middleware[$this->index];
            }
            $this->index++ ;
            return $middleware;
        }
        return null;
    }
}
