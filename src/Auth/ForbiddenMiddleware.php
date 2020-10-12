<?php

namespace App\Auth;

use Framework\Auth\ForbiddenException;
use Framework\Session\FlashService;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of ForbiddenMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class ForbiddenMiddleware implements MiddlewareInterface
{

    /**
     * @var \Framework\Session\SessionInterface
     */
    private $session;
    /**
     * @var string
     */
    private $loginPath;

    public function __construct(string $loginPath, \Framework\Session\SessionInterface $session)
    {
        $this->loginPath = $loginPath;
        $this->session = $session;
    }
    
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        
        try {
            return  $delegate->process($request);
        } catch (ForbiddenException $ex) {
            return $this->redirectLogin($request);
        } catch (\TypeError $error) {
            if (strpos($error->getMessage(), \Framework\Auth\User::class) !== false) {
                return $this->redirectLogin($request);
            }
        }
    }
    
    public function redirectLogin(ServerRequestInterface $request):ResponseInterface
    {
          $this->session->set('auth.redirect', $request->getUri()->getPath());
            (new FlashService($this->session))->error('Vous devez posséder un compte pour accéder a cette page');
            return new \Framework\Response\RedirectResponse($this->loginPath);
    }
}
