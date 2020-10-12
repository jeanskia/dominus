<?php

namespace Framework\Router;

/**
 * Description of RouterFactory
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class RouterFactory
{
   
    public function __invoke(\Psr\Container\ContainerInterface $container)
    {
        $cache = null;
        if ($container->get('env') === 'production') {
            $cache = 'tmp/routes';
        }
        return new \Framework\Router($cache);
    }
}
