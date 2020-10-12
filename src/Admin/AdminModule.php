<?php
namespace App\Admin;

use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRenderer;
use Framework\Router;

/**
 * Description of AdminModule
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class AdminModule extends Module
{
    
    const DEFINITIONS = __DIR__.'/config.php' ;


    public function __construct(RendererInterface $render, Router $router, string $prefix, AdminTwigExtension $adminTwigExtension)
    {
        $render->addPath('admin', __DIR__.'/views');
        $router->get($prefix, DashboardAction::class, 'admin');
        if ($render instanceof TwigRenderer) {
            $render->getTwig()->addExtension($adminTwigExtension);
        }
    }
}
