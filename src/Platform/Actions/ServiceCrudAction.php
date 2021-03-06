<?php

namespace App\Platform\Actions;

use App\Platform\Table\ServiceTable;
use Framework\Actions\CrudAction;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Framework\Session\FlashService;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of ServiceCrudAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class ServiceCrudAction extends CrudAction
{
    
    protected $viewPath = '@platform/admin/services';
    
    protected $routePrefix = 'platform.admin.service';
    
    public function __construct(RendererInterface $renderer, Router $router, ServiceTable $table, FlashService $flash)
    {
        parent::__construct($renderer, $router, $table, $flash);
    }

    protected function getParams(serverRequestInterface $request)
    {
        return array_filter($request->getParsedBody(), function ($key) {
            return in_array($key, ['name']);
        }, ARRAY_FILTER_USE_KEY);
       // return $params = array_merge($params, ['created_at'=> date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')]);
    }
    
    protected function getValidator(ServerRequestInterface $request)
    {
        return parent::getValidator($request)
                ->required('name')
                ->notEmpty('name')
                ->length('name', 2, 150);
    }
}
