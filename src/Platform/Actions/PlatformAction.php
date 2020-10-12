<?php
namespace App\Platform\Actions ;

use App\Platform\Table\AgentTable;
use Framework\Actions\RouterAwareAction;
use Framework\Auth\User;
use Framework\Renderer\RendererInterface;
use Framework\Router;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Description of PlatformAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class PlatformAction
{

    private $user;

    /**
     * @var AgentTable
     */
    private $agentTable;
    /**
     *
     * @var RendererInterface
     */
    private $renderer;
    /**
     *
     * @var Router
     */
    private $router;

    use RouterAwareAction;
    
    public function __construct(RendererInterface $renderer, Router $router, AgentTable $agentTable/**,User $user**/)
    {
        $this->renderer = $renderer;
        $this->router = $router;
        $this->agentTable = $agentTable;
  //      $this->user = $user;
    }
    
    public function __invoke(Request $request)
    {
        if ($request->getAttribute('id')) {
            return $this->profile($request);
        } elseif ($request->getUri()->getPath() === '/agent/contractuels') {
            return $this->getContractuel($request);
        } elseif ($request->getUri()->getPath() === '/agent/fonctionnaires') {
            return $this->getfonctionnaire($request);
        }
        return $this->index($request);
    }
    /**
     * page principale pour les agents     *
     * @param Request $request
     * @return string
     */
    public function index(Request $request): string
    {
        $params = $request->getQueryParams();
        $items = $this->agentTable->findPaginatedIndex(10, $params['p']??1);
        return $this->renderer->render('@platform/index', compact('items'));
    }
    
    /**
     * page de profile carrière     *
     * @param Request $request
     * @return type
     */
    public function profile(Request $request)
    {
        $item = $this->agentTable->getInfo($request->getAttribute('id'));
        if ($request->getAttribute('slug') !== $item->slug) { //une erreur a corrigé a ce niveau !
            return $this->redirect('platform.index');
        }
        return $this->renderer->render('@platform/profile', compact('item'));
    }
    
    /**
     * page liste des contractuels
     * @return type
     */
    public function getContractuel(Request $request)
    {
        $params = $request->getQueryParams();
        $items = $this->agentTable->findPaginatedContractual(10, $params['p']??1);
        return $this->renderer->render('@platform/listingContractual', compact('items'));
    }
    
    /**
     * page liste des fonctionnaires     *
     * @return type
     */
    public function getfonctionnaire(Request $request)
    {
        $params = $request->getQueryParams();
        $items = $this->agentTable->findPaginatedFonctionnaire(10, $params['p']??1);
        return $this->renderer->render('@platform/listingFonctionnaire', compact('items'));
    }
}
