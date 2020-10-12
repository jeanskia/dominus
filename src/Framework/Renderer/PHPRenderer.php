<?php

namespace Framework\Renderer;

use Framework\Renderer\RendererInterface;

/**
 * Description of PHPRenderer
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class PHPRenderer implements RendererInterface
{

    const DEFAULT_NAMESPACE = '__MAIN';

    private $paths = [];
    /**
     *variables globalement accessibles à toutes les vues
     * @var array
     */
    private $globals = [];
    
    public function __construct(string $defaultpath = null)
    {
        if (!is_null($defaultpath)) {
            $this->addPath($defaultpath);
        }
    }

    /**
     *permet de rajouté un chemin pour charger les vues
     *
     * @param string $namespace
     * @param string $path
     */
    public function addPath(string $namespace, string $path = null):void
    {
        if (is_null($path)) {
            $this->paths[self::DEFAULT_NAMESPACE] = $namespace;
        } else {
            $this->paths[$namespace] = $path;
        }
    }
    /**
     * permet de rendre une vue le chemin peut être précisè avec des namespace rajouté via le addPath()
     *
     * $this->render('@blog/view')
     * $this->render(view)
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render(string $view, array $params = []): string
    {
       
        if ($this->hasNamespace($view)) {
            $path = $this->replaceNamespace($view).'.php';
        } else {
            $path = $this->paths[self::DEFAULT_NAMESPACE].DIRECTORY_SEPARATOR.$view.'.php';
        }
        ob_start();
        $renderer = $this ;
        extract($this->globals);
        extract($params);
        require($path);
        return ob_get_clean();
    }
    
    /**
     * permet de rajouter des variables globales à toute les vues
     * @param string $key
     * @param mixed $value
     */
    public function addGlobal(string $key, $value):void
    {
        $this->globals[$key] = $value;
    }
    
    private function hasNamespace(string $view): bool
    {
        return $view[0] ==='@';
    }
    
    private function getNamespace(string $view): string
    {
        return substr($view, 1, strpos($view, '/')-1);
    }
    
    private function replaceNamespace(string $view): string
    {
        $namespace = $this->getNamespace($view);
        return str_replace('@'.$namespace, $this->paths[$namespace], $view);
    }
}
