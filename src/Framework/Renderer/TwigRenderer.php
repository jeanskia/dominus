<?php

namespace Framework\Renderer;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Description of TwigRenderer
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class TwigRenderer implements RendererInterface
{
    
    private $twig;
    
    private $loader;

    public function __construct(Twig_Loader_Filesystem $loader, Twig_Environment $twig)
    {
        $this->loader = $loader ;
        $this->twig = $twig;
    }
    
    public function addGlobal(string $key, $value):void
    {
        $this->twig->addGlobal($key, $value);
    }

    public function addPath(string $namespace, string $path = null):void
    {
        $this->loader->addPath($path, $namespace);
    }

    public function render(string $view, array $params = []): string
    {
        return $this->twig->render($view.'.twig', $params);
    }
    /**
     *
     * @return Twig_Environment
     */
    public function getTwig(): \Twig_Environment
    {
        return $this->twig;
    }
}
