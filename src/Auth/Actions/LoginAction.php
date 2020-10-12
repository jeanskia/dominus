<?php
namespace App\Auth\Actions;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Description of LoginAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class LoginAction
{

    /**
     * @var \Framework\Renderer\RendererInterface
     */
    private $render;

    public function __construct(\Framework\Renderer\RendererInterface $render)
    {
        $this->render = $render;
    }
    
    public function __invoke(ServerRequestInterface $request)
    {
       
        return $this->render->render('@auth/login');
    }
}
