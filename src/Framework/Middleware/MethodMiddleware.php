<?php

namespace Framework\Middleware;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of MethodMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MethodMiddleware
{
    
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        $parseBody = $request->getParsedBody();
        if (array_key_exists('_method', $parseBody) && in_array($parseBody['_method'], ['DELETE','PUT'])) {
            $request = $request->withMethod($parseBody['_method']);
        }
        return $next($request);
    }
}
