<?php
namespace App\Platform;

use App\Platform\Actions\AgentCrudAction;
use App\Platform\Actions\DiplomeCrudAction;
use App\Platform\Actions\PlatformAction;
use App\Platform\Actions\ProfessionCrudAction;
use App\Platform\Actions\ServiceCrudAction;
use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Psr\Container\ContainerInterface;

/**
 * Description of PlateformModule
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class PlatformModule extends Module
{
   
    const DEFINITIONS = __DIR__.'/config.php' ;
    const MIGRATIONS = __DIR__.'/db/migrations';
    const SEEDS = __DIR__.'/db/seeds';
    
    
    public function __construct(ContainerInterface $container)
    {
        $container->get(RendererInterface::class)->addPath('platform', __DIR__.'/views');
        $router = $container->get(Router::class);
        $router->get($container->get('agent.prefix'), PlatformAction::class, 'platform.index');
        $router->get(
            $container->get('agent.prefix').'/profile/{slug}-{id:\d+}',
            PlatformAction::class,
            'platform.profile'
        );
        $router->get($container->get('agent.prefix').'/contractuels', PlatformAction::class, 'platform.contractuel');
        $router->get($container->get('agent.prefix').'/fonctionnaires', PlatformAction::class, 'platform.fonctionnaires');
        
        if ($container->has('admin.prefix')) {
            $prefix = $container->get('admin.prefix');
            $router->crud("$prefix/agents", AgentCrudAction::class, 'platform.admin.agent');
            $router->crud("$prefix/services", ServiceCrudAction::class, 'platform.admin.service');
            $router->crud("$prefix/professions", ProfessionCrudAction::class, 'platform.admin.profession');
            $router->crud("$prefix/diplomes", DiplomeCrudAction::class, 'platform.admin.diplome');
        }
    }
}
