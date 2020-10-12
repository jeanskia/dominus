<?php
namespace Framework\Middleware;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of TrailingSlashMiddleware
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class TrailingSlashMiddleware
{
   
    public function __invoke(ServerRequestInterface $request, callable $next)
    {
        $uri = $request->getUri()->getPath();
        if (!empty($uri) && substr($uri, -1) === "/") {
            return (new Response())
                            ->withStatus(301)
                            ->withHeader('Location', substr($uri, 0, -1));
        }
        return $next($request);
    }
}
