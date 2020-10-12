<?php

namespace App\Platform\Actions;

use App\Platform\Entity\Agent;
use App\Platform\Table\AgentTable;
use App\Platform\Table\CategoryTable;
use App\Platform\Table\DiplomaTable;
use App\Platform\Table\FunctionTable;
use App\Platform\Table\GradeTable;
use App\Platform\Table\MaritalStatusTable;
use App\Platform\Table\ProfessionTable;
use App\Platform\Table\ServiceTable;
use App\Platform\Table\SexTable;
use App\Platform\Table\StatusTable;
use DateTime;
use Framework\Actions\CrudAction;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Framework\Session\FlashService;
use Psr\Http\Message\ServerRequestInterface ;

/**
 * Description of AdminPlatformAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class AgentCrudAction extends CrudAction
{

    /**
     * @var FunctionTable
     */
    private $functionTable;

    /**
     * @var StatusTable
     */
    private $statusTable;

    /**
     * @var DiplomaTable
     */
    private $diplomaTable;

    /**
     * @var GradeTable
     */
    private $gradeTable;

    /**
     * @var CategoryTable
     */
    private $categoryTable;

    /**
     * @var ProfessionTable
     */
    private $professionTable;

    /**
     * @var MaritalStatusTable
     */
    private $maritalStatus;

    /**
     * @var SexTable
     */
    private $sexTable;

    /**
     * @var ServiceTable
     */
    private $serviceTable;
    
    protected $viewPath = '@platform/admin/agents';
    
    protected $routePrefix = 'platform.admin.agent';
    
    public function __construct(
        RendererInterface $renderer,
        Router $router,
        AgentTable $table,
        FlashService $flash,
        ServiceTable $serviceTable,
        SexTable $sexTable,
        MaritalStatusTable $maritalStatus,
        ProfessionTable $professionTable,
        CategoryTable $categoryTable,
        GradeTable $gradeTable,
        DiplomaTable $diplomaTable,
        StatusTable $statusTable,
        FunctionTable $functionTable
    ) {
        parent::__construct($renderer, $router, $table, $flash);
        //Possibilité d'injecté le conteneur plutot que chaque table
        $this->serviceTable = $serviceTable;
        $this->sexTable = $sexTable;
        $this->maritalStatus = $maritalStatus;
        $this->professionTable = $professionTable;
        $this->categoryTable = $categoryTable;
        $this->gradeTable = $gradeTable;
        $this->diplomaTable = $diplomaTable;
        $this->statusTable = $statusTable;
        $this->functionTable = $functionTable;
        $this->agentTable = $table;
    }
    
    protected function formParams(array $params): array
    {
        $params['services'] = $this->serviceTable->findlist();
        $params['sex'] = $this->sexTable->findlist();
        $params['maritalStatus'] = $this->maritalStatus->findlist();
        $params['profession'] = $this->professionTable->findlist();
        $params['category'] = $this->categoryTable->findlist();
        $params['grade'] = $this->gradeTable->findlist();
        $params['diploma'] = $this->diplomaTable->findlist();
        $params['status'] = $this->statusTable->findlist();
        $params['function'] = $this->functionTable->findlist();
        $params['child'] = $this->numberchild();
        return $params;
    }
    
    protected function getNewEntity()
    {
        $agent = new Agent();
        $agent->birth_date = new DateTime('01-01-1970');
        $agent->service_taked_at = new DateTime();
        return $agent;
    }

    protected function getParams(ServerRequestInterface $request)
    {
        $requestParams =  $request->getParsedBody();
        $params = array_filter($requestParams, function ($key) {
            return in_array($key, ['name','first_name','registration','place_of_birth','birth_date','updated_at',
                        'father_name','mother_name','contact_emergency','e_mail','child','service_taked_at','phone1','phone2','service_id',
                        'sex_id','maritalstatus_id','Profession_id','category_id','grade_id','diploma_id','status_id','function_id']);
        }, ARRAY_FILTER_USE_KEY);
        return $params = array_merge(
            $params,
            ['created_at'=> date('Y-m-d H:i:s'),
                                    'slug'=> str_replace(' ', '-', trim($requestParams['name']).' '.trim($requestParams['first_name']))
                                    ]
        );
    }
    
    protected function getValidator(ServerRequestInterface $request)
    {
        return parent::getValidator($request)
                ->required(
                    'name',
                    'first_name',
                    'registration',
                    'place_of_birth',
                    'birth_date',
                    'service_taked_at',
                    'phone1',
                    'service_id',
                    'sex_id',
                    'maritalstatus_id',
                    'Profession_id',
                    'category_id',
                    'grade_id',
                    'diploma_id',
                    'status_id'
                )
                ->notEmpty(
                    'name',
                    'first_name',
                    'birth_date',
                    'phone1',
                    'service_taked_at',
                    'service_id',
                    'sex_id',
                    'maritalstatus_id',
                    'Profession_id',
                    'category_id',
                    'grade_id',
                    'diploma_id',
                    'status_id',
                    'function_id'
                )
                ->validEmail('e_mail')
                ->length('name', 2, 150)
                ->length('first_name', 2, 200)
                ->length('place_of_birth', 0, 200)
                ->exists('service_id', $this->serviceTable->getTable(), $this->serviceTable->getPdo())
                ->exists('sex_id', $this->sexTable->getTable(), $this->sexTable->getPdo())
                ->exists('maritalstatus_id', $this->maritalStatus->getTable(), $this->maritalStatus->getPdo());
    }
    
    private function numberchild()
    {
        return [0,1,2,3,4,5,6,7,8,9,10];
    }
    
    protected function getEditableIndex(ServerRequestInterface $request)
    {
        $params = $request->getQueryParams();
        return $items = $this->agentTable->findPaginatedIndex(10, $params['p']??1);
    }
}
