<?php

namespace App\Mission\Actions;

use App\Mission\Entity\Mission;
use App\Mission\Table\MissionTable;
use App\Mission\Table\TypeMissionTable;
use App\Platform\Table\AgentTable;
use App\Platform\Table\ServiceTable;
use DateTime;
use Framework\Actions\CrudAction;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Framework\Session\FlashService;
use Psr\Http\Message\ServerRequestInterface;

/**
 * défini les différentes actions possible en tant qu'administrateur sur le module mission
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MissionCrudAction extends CrudAction
{

    /**
     * @var AgentTable
     */
    private $agentTable;

    /**
     *
     * @var string
     */
    protected $viewPath = '@mission/admin/mission';
    /**
     *
     * @var string
     */
    protected $routePrefix = 'mission.admin';
    /**
     *
     * @var array
     */
    protected $message = [
        'create'=>'la mission à bien été crée',
        'edit'=>'la mission à bien été modifié',
        'delete'=>'la mission à été supprimé',
    ];
    
    private $serviceTable;
    
    private $type_mission;

    public function __construct(
        RendererInterface $renderer,
        Router $router,
        MissionTable $missionTable,
        AgentTable $agentTable,
        FlashService $flash,
        ServiceTable $serviceTable,
        TypeMissionTable $type_missionTable
    ) {
        parent::__construct($renderer, $router, $missionTable, $flash);
        $this->serviceTable = $serviceTable;
        $this->type_mission = $type_missionTable;
        $this->agentTable = $agentTable;
    }
    
    protected function formParams(array $params):array
    {
        $params['services'] = $this->serviceTable->findlist();
        $params['type_mission'] = $this->type_mission->findlist() ;
        $params['upper_hierarchy'] = $this->agentTable->getDirector();
        $params['transport'] = ['Véhicule ANDE'=>'Véhicule ANDE','Véhicule Promoteur'=>'Véhicule Promoteur','Véhicule de Location'=>'Véhicule de Location'];
        $params['budget_allocation'] = ['ANDE'=>'ANDE','AUTRE'=>'AUTRE','PROMOTEUR'=>'PROMOTEUR'];
        return $params;
    }
    
    protected function getNewEntity()
    {
        $mission = new Mission();
        $mission->start_mission = new DateTime();
        $mission->end_mission = new DateTime();
        return $mission;
    }

    protected function getParams(ServerRequestInterface $request)
    {
        $paramsRequest = $request->getParsedBody();
        $params = array_filter($paramsRequest, function ($key) {
            return in_array($key, ['service_id','type_mission_id','name','location','transport',
                                   'budget_allocation','start_mission','end_mission','upper_hierarchy_id']);
        }, ARRAY_FILTER_USE_KEY);
        $duration_mission = $this->getDurationMission($params['start_mission'], $params['end_mission']);
        return $params = array_merge($params, ['created_at' =>date('Y-m-d H:i:s'),'duration_mission'=>$duration_mission,
                                              'slug' => str_replace(' ', '-', trim(substr($paramsRequest['name'], 0, 30)))
            ]);
    }
    
    protected function getValidator(ServerRequestInterface $request)
    {
        return parent::getValidator($request)
                ->required('name', 'location', 'start_mission')
                ->notEmpty('name', 'location', 'start_mission')
                ->length('name', 4, 255)
                ->length('location', 4, 255);
    }
    
    private function getDurationMission($date_debut, $date_fin)
    {
        $date1 = new DateTime($date_debut);
        $date2 = new DateTime($date_fin);
        $diff = $date2->diff($date1)->format("%a");
        return $diff + 1;
    }
}
