<?php

namespace Framework\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of CsrfMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class CsrfMiddleware implements MiddlewareInterface
{

    /**
     * @var int
     */
    private $limit;

    /**
     * @var string
     */
    private $session;
    
    private $formkey ;
    
    private $sessionkey ;
    
    public function __construct(&$session, int $limit = 50, string $formKey = '_csrf', string $sessionKey = 'csrf')
    {
        $this->validSession($session);
        $this->session = &$session;
        $this->formkey = $formKey;
        $this->sessionkey = $sessionKey;
        $this->limit = $limit;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        if (in_array($request->getMethod(), ['POST','PUT','DELETE'])) {
            $params = $request->getParsedBody() ?: [];
            if (!array_key_exists($this->formkey, $params)) {
                $this->reject();
            } else {
                $csrfList = $this->session[$this->sessionkey] ?? [];
                if (in_array($params[$this->formkey], $csrfList)) {
                    $this->useToken($params[$this->formkey]);
                    return $delegate->process($request);
                } else {
                    $this->reject();
                }
            }
        } else {
            return $delegate->process($request);
        }
    }
    
    public function generateToken(): string
    {
        $token = bin2hex(random_bytes(16));
        $csrfList = $this->session[$this->sessionkey] ?? [];
        $csrfList[] = $token;
        $this->session[$this->sessionkey] = $csrfList;
        $this->limiteToken();
        return $token;
    }

    private function reject(): void
    {
        throw new \Framework\Exception\CsrfInvalidException();
    }

    private function useToken($token): void
    {
        $tokens = array_filter($this->session[$this->sessionkey], function ($t) use ($token) {
            return $token !== $t ;
        }) ;
        $this->session[$this->sessionkey] = $tokens;
    }

    public function limiteToken(): void
    {
        $tokens = $this->session[$this->sessionkey] ?? [];
        if (count($tokens) > $this->limit) {
            array_shift($tokens);
        }
        $this->session[$this->sessionkey] = $tokens;
    }

    public function validSession($session)
    {
        if (!is_array($session) && !$session instanceof \ArrayAccess) {
            throw new \TypeError('La session passé au middleware CSRF n\'est pas traitable comme tableau') ;
        }
    }
    
    public function getFormKey():string
    {
        return $this->formkey;
    }
}
