<?php

namespace App\Auth\Actions;

use App\Auth\DatabaseAuth;
use Framework\Actions\RouterAwareAction;
use Framework\Renderer\RendererInterface;
use Framework\Response\RedirectResponse;
use Framework\Router;
use Framework\Session\FlashService;
use Framework\Session\SessionInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\RouterInterface;

/**
 * Description of LoginAttemptAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class LoginAttemptAction
{

    /**
     * @var SessionInterface
     */
    private $session;
    /**
     * @var RouterInterface
     */
    private $router;
    
    /**
     * @var DatabaseAuth
     */
    private $auth;

    /**
     * @var RendererInterface
     */
    private $render;
    
    use RouterAwareAction;

    public function __construct(
        RendererInterface $render,
        DatabaseAuth $auth,
        Router $router,
        SessionInterface $session
    ) {
        $this->render = $render;
        $this->auth = $auth;
        $this->router = $router;
        $this->session = $session;
    }
    
    public function __invoke(ServerRequestInterface $request)
    {
        $params = $request->getParsedBody();
        $user = $this->auth->login($params['username'], $params['password']);
        if ($user) {
            $path = $this->session->get('auth.redirect') ?: $this->router->generateUri('admin') ;
            $this->session->delete('auth.redirect');
            return new RedirectResponse($path);
        } else {
            ( new FlashService($this->session))->error('Identifiant ou mot de passe incorrect');
            return $this->redirect('auth.login');
        }
        return $this->render->render('@auth/login');
    }
}
