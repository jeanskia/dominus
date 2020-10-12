<?php
namespace App\Mission;

use App\Mission\Actions\MissionAction;
use App\Mission\Actions\MissionCrudAction;
use Framework\Module;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Psr\Container\ContainerInterface;

/**
 * Description of MissionModule
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MissionModule extends Module
{
    const DEFINITIONS = __DIR__.'/config.php' ;
    const MIGRATIONS = __DIR__.'/db/migrations';
    const SEEDS = __DIR__.'/db/seeds';
    
    
    public function __construct(ContainerInterface $container)
    {
        $container->get(RendererInterface::class)->addPath('mission', __DIR__.'/views');
        $router = $container->get(Router::class);
        $router->get($container->get('mission.prefix'), MissionAction::class, 'mission.index');
        $router->get(
            $container->get('mission.prefix').'/details/{slug}-{id:\d+}',
            MissionAction::class,
            'mission.details'
        );
        $router->get($container->get('mission.prefix').'/assignto/{id:\d+}', MissionAction::class, 'mission.assign');
        $router->get($container->get('mission.prefix').'/assigntoEIES/{id:\d+}', MissionAction::class, 'mission.assignEies');
        $router->get($container->get('mission.prefix').'/assigntoEES/{id:\d+}', MissionAction::class, 'mission.assignEes');
        $router->get($container->get('mission.prefix').'/assigntoAE/{id:\d+}', MissionAction::class, 'mission.assignAe');
        $router->get($container->get('mission.prefix').'/assigntoCOM/{id:\d+}', MissionAction::class, 'mission.assignCom');
        $router->get($container->get('mission.prefix').'/assigntoDRIV/{id:\d+}', MissionAction::class, 'mission.assignDriv');
        $router->post($container->get('mission.prefix').'/assignto/{id:\d+}', MissionAction::class);
        $router->delete($container->get('mission.prefix').'/removepartcipant/{slugMission}-{idMission:\d+}-{id:\d+}', MissionAction::class, "mission.participant.delete");
        $router->get($container->get('mission.prefix').'/generate/{slugAgent}-{idAgent}-{idMis:\d+}', MissionAction::class, 'mission.generate.odm');
        //Admin
        if ($container->has('admin.prefix')) {
            $prefixPath = $container->get('admin.prefix');
            $router->crud($prefixPath.'/mission', MissionCrudAction::class, 'mission.admin');
        }
    }
}
