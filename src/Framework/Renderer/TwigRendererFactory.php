<?php

namespace Framework\Renderer;

use Interop\Container\ContainerInterface;
use Twig\Extension\DebugExtension;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Description of TwigRendererFactory
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class TwigRendererFactory
{
    
    public function __invoke(ContainerInterface $container): TwigRenderer
    {
        $debug = $container->get('env') !== 'production';
        $viewPath = $container->get('views.path');
        $loader = new Twig_Loader_Filesystem($viewPath);
        $twig = new Twig_Environment($loader, [
            'debug'=>$debug,
            'cache'=> $debug ? fasle :'tmp/views',
            'auto_reload' =>  $debug ? fasle : true,
            
            ]);
        $twig->addExtension(new DebugExtension());
        if ($container->has('twig.extensions')) {
            foreach ($container->get('twig.extensions') as $extension) {
                $twig->addExtension($extension);
            }
        }
        return new TwigRenderer($loader, $twig);
    }
}
