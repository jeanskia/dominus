<?php
namespace App\Mission\Actions;

use App\Mission\Table\MissionTable;
use App\Mission\Table\ParticipateInMissionTable;
use App\Platform\Table\AgentTable;
use Framework\Actions\RouterAwareAction;
use Framework\Renderer\RendererInterface;
use Framework\Renderer\TwigRenderer;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Description of MissionAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MissionAction
{

    /**
     * @var \Framework\Router
     */
    private $router;

    /**
     * @var ParticipateInMissionTable
     */
    private $participateInMission;

    /**
     * @var AgentTable
     */
    private $agentTable;

    /**
     * @var MissionTable
     */
    private $missionTable;

    /**
     * @var TwigRenderer
     */
    private $renderer;
    
    use RouterAwareAction;
    use \Framework\Actions\DefaultControllerAction;

    public function __construct(\Framework\Router $router, RendererInterface $renderer, MissionTable $missionTable, ParticipateInMissionTable $participateInMission, AgentTable $agentTable)
    {
        $this->renderer = $renderer;
        $this->missionTable = $missionTable;
        $this->agentTable = $agentTable;
        $this->participateInMission = $participateInMission;
        $this->router = $router;
    }
    
    public function __invoke(Request $request)
    {
        
         $uriParsed = $this->parsingUri($request->getUri()->getPath());
         
        if ($request->getAttribute('id') && $request->getAttribute('slug')) {
            return $this->show($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'assignto') {
            return $this->assignAgentToMission($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'removepartcipant') {
            return $this->removeParticipant($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'generate') {
            return $this->generateODM($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'assigntoEIES') {
            return $this->assignEIES($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'assigntoEES') {
            return $this->assignEES($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'assigntoAE') {
            return $this->assignAE($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'assigntoCOM') {
            return $this->assignCOM($request);
        } elseif (isset($uriParsed[2]) && $uriParsed[2] === 'assigntoDRIV') {
            return $this->assignDRIV($request);
        }
        return $this->index();
    }
    /**
     * liste les mission du mois en cours
     *
     * @return type
     */
    public function index()
    {
        $items = $this->missionTable->getMissionOfTheMonth();
        return $this->renderer->render('@mission/index', compact('items'));
    }
    /**
     * Affiche les informations sur une mission
     *
     * @param Request $request
     * @return type
     */
    public function show(Request $request)
    {
        $item = $this->missionTable->getDetails($request->getAttribute('id'));
        $agents = $this->participateInMission->getParticipant($request->getAttribute('id'));
        return $this->renderer->render('@mission/detailsMission', compact('item', 'agents'));
    }
    
    public function assignAgentToMission(Request $request)
    {
        $item = $this->missionTable->find($request->getAttribute('id'));
        $agents = $this->agentTable->getAgentsByService($item->service_id);
        $data = [];
        if ($request->getMethod() == 'POST') {
            $params = $this->getParams($request);
            $data['mission_id'] = $item->id;
            $data['agent_id'] = $params['name1'];
            $data['executed_on'] = $item->start_mission;
            //
            $this->participateInMission->insert($data);
            return $this->redirect('mission.details', ['slug'=>$item->slug,
                                                  'id'=>$item->id]);
        }
        return $this->renderer->render('@mission/assignAgentTo', compact('item', 'agents'));
    }
    
    public function assignEIES(Request $request)
    {
        $item = $this->missionTable->find($request->getAttribute('id'));
        $agents = $this->agentTable->getAgentFrom('EIES');
        return $this->renderer->render('@mission/assignAgentTo', compact('item', 'agents'));
    }
    
    public function assignEES(Request $request)
    {
        $item = $this->missionTable->find($request->getAttribute('id'));
        $agents = $this->agentTable->getAgentFrom('EES');
        return $this->renderer->render('@mission/assignAgentTo', compact('item', 'agents'));
    }
    
    public function assignAE(Request $request)
    {
        $item = $this->missionTable->find($request->getAttribute('id'));
        $agents = $this->agentTable->getAgentFrom('AE');
        return $this->renderer->render('@mission/assignAgentTo', compact('item', 'agents'));
    }
    
    public function assignCOM(Request $request)
    {
        $item = $this->missionTable->find($request->getAttribute('id'));
        $agents = $this->agentTable->getAgentFrom('COM');
        return $this->renderer->render('@mission/assignAgentTo', compact('item', 'agents'));
    }
    
    public function assignDRIV(Request $request)
    {
        $item = $this->missionTable->find($request->getAttribute('id'));
        $agents = $this->agentTable->getDrivers();
        return $this->renderer->render('@mission/assignAgentTo', compact('item', 'agents'));
    }
    
    public function removeParticipant(Request $request)
    {
        $this->participateInMission->delete($request->getAttribute('id'));
        return $this->redirect('mission.details', ['slug'=>$request->getAttribute('slugMission'),
                                                  'id'=>$request->getAttribute('idMission')]);
    }
    
    public function generateODM(Request $request)
    {
        $agent = $this->agentTable->getInfo($request->getAttribute('idAgent'));
        $mission = $this->missionTable->find($request->getAttribute('idMis'));
        $upper_hierarchy = $this->agentTable->getInfo($mission->upper_hierarchy_id);
        $date_deb = $this->formatDate($mission->start_mission);
        $date_fin = $this->formatDate($mission->end_mission);
        require dirname(dirname(__DIR__)).'/Framework/Doc/OrdreDeMission.php';
        die();
    }

    private function getParams(Request $request)
    {
        return array_filter($request->getParsedBody(), function ($key) {
            return in_array($key, ['name1','name2','name3','name4','name5','name6']);
        }, ARRAY_FILTER_USE_KEY);
    }
    
    private function parsingUri($uri)
    {
        $params = explode('/', $uri);
        return $params;
    }

    /**
     * Affiche les missions validées et réfusé du mois en cours     *
     */
    
    /**
     * Affiche le nombre de mission par type d'étude et le nombre total de missions
     */
}
