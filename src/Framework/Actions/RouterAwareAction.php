<?php
namespace Framework\Actions;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Rajoute des méthodes liée à l'utilisation du router
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
trait RouterAwareAction
{
   /**
    * Renvoie une réponse de redirection
    *
    * @param string $path
    * @param array $params
    * @return ResponseInterface
    */
    public function redirect(string $path, array $params = []):ResponseInterface
    {
         $redirectUri = $this->router->generateUri($path, $params);
         return (new Response())->withStatus(301)->withHeader('Location', $redirectUri);
    }
}
