<?php

namespace Framework\Auth;

use Framework\Auth;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of LoggedInMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class LoggedInMiddleware implements MiddlewareInterface
{

    /**
     * @var Auth
     */
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
   
    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        $user = $this->auth->getUser();
        if (is_null($user)) {
            throw new ForbiddenException();
        }
        return $delegate->process($request->withAttribute('user', $user));
    }
}
