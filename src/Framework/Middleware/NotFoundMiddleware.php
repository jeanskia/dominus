<?php

namespace Framework\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\RequestInterface;

/**
 * Description of NotFoundMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class NotFoundMiddleware
{
    
    public function __invoke(RequestInterface $request, callable $next)
    {
        return new Response(404, [], 'Erreur 404')  ;
    }
}
