<?php

namespace App\Auth\Actions;

use App\Auth\DatabaseAuth;
use Framework\Renderer\RendererInterface;
use Framework\Session\FlashService;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of LogoutAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class LogoutAction
{

    /**
     * @var FlashService
     */
    private $flashService;

    /**
     * @var DatabaseAuth
     */
    private $auth;

    /**
     * @var RendererInterface
     */
    private $render;

    public function __construct(RendererInterface $render, DatabaseAuth $auth, FlashService $flashService)
    {
        $this->render = $render;
        $this->auth = $auth;
        $this->flashService = $flashService;
    }
    
    public function __invoke(ServerRequestInterface $request)
    {
        $this->auth->logout();
        $this->flashService->succes('vous êtes maintenant déconnecté');
        return new \Framework\Response\RedirectResponse('/login');
    }
}
