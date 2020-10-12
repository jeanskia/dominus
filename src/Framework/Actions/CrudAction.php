<?php

namespace Framework\Actions;

use Framework\Database\Table;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Framework\Session\FlashService;
use Framework\Validator;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Description of CrudAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class CrudAction
{
   
    /**
     * @var FlashService
     */
    private $flash;

    /**
     * @var Table
     */
    private $table;

    /**
     * @var Router
     */
    private $router;

    /**
     * @var RendererInterface
     */
    private $renderer;
    /**
     *
     * @var string
     */
    protected $viewPath;
    /**
     *
     * @var string
     */
    protected $routePrefix;
    /**
     *
     * @var array
     */
    protected $message = [
        'create'=>'L\'élément à bien été crée',
        'edit'=>'L\'élément à bien été modifié',
        'delete'=>'L\'élément à bien été supprimé',
    ];


    use RouterAwareAction;

    public function __construct(RendererInterface $renderer, Router $router, Table $table, FlashService $flash)
    {
        $this->renderer = $renderer;
        $this->router = $router;
        $this->flash = $flash;
        $this->table = $table;
    }
    
    public function __invoke(Request $request)
    {
        //ajout de variable globale via Twig
        $this->renderer->addGlobal('viewPath', $this->viewPath);
        $this->renderer->addGlobal('routePrefix', $this->routePrefix);
         
        if ($request->getMethod() === 'DELETE') {
            return $this->delete($request->getAttribute('id'));
        }
        
        if (substr((string)$request->getUri(), -3) === 'new') {
            return $this->create($request) ;
        }
        
        if ($request->getAttribute('id')) {
            return $this->edit($request);
        }
           return $this->index($request);
    }
    /**
     * Affiche la liste des éléments
     *
     * @param Request $request
     * @return type
     */
    public function index(Request $request)
    {
       // $params = $request->getQueryParams();
        $items = $this->getEditableIndex($request);
        return $this->renderer->render($this->viewPath.'/index', compact('items'));
    }
    /**
     * Créer un élément
     *
     * @param Request $request
     * @return type
     */
    public function create(Request $request)
    {
        $item = $this->getNewEntity();
        if ($request->getMethod() === 'POST') {
            $params = $this->getParams($request);
            $validator = $this->getValidator($request);
            if ($validator->isValide()) {
                $this->table->insert($params);
                $this->flash->succes($this->message['create']);
                return $this->redirect($this->routePrefix.'.index');
            }
            $item = $params;
            $errors = $validator->getErrors();
        }
        
        return $this->renderer->render($this->viewPath.'/create', $this->formParams(compact('item', 'errors')));
    }
    /**
     * Modifie [met à jour] les valeurs d'un élément
     *
     * @param Request $request
     * @return type
     */
    public function edit(Request $request)
    {
        $item = $this->table->find($request->getAttribute('id'));
        if ($request->getMethod() === 'POST') {
            $params = $this->getParams($request);
            $validator = $this->getValidator($request);
       
            if ($validator->isValide()) {
                $this->table->update($item->id, $params);
                $this->flash->succes($this->message['edit']);
                return $this->redirect($this->routePrefix.'.index');
            }
            $params['id'] = $item->id;
            $item = $params;
            $errors = $validator->getErrors();
        }
     
        return $this->renderer->render($this->viewPath.'/edite', $this->formParams(compact('item', 'errors')));
    }
    /**
     * Supprime un enregistrement
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->table->delete($id);
        $this->flash->succes($this->message['delete']);
        return $this->redirect($this->routePrefix.'.index');
    }

    /**
     * récupère un tableau de clé valide correspondant à un ensemble de propriété de la table ciblé
     * @param Request $request
     * @return type
     */
    protected function getParams(Request $request)
    {
        return array_filter($request->getParsedBody(), function ($key) {
            return in_array($key, []);
        }, ARRAY_FILTER_USE_KEY);
    }
    /**
     * Génère le validateur pour valider les données
     *
     * @param Request $request
     * @return Validator
     */
    protected function getValidator(Request $request)
    {
        return new Validator($request->getParsedBody());
    }
    /**
     * Génère une nouvelle entité pour l'action de création
     *
     * @return type
     */
    protected function getNewEntity()
    {
        return [];
    }
    /**
     *  Traite les paramètres à envoyer à la vue
     *
     * @param type $params
     * @return array
     */
    protected function formParams(array $params):array
    {
        return $params;
    }
    
    protected function getEditableIndex(Request $request)
    {
        return $items = $this->table->findAll();
    }
}
