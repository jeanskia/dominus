<?php

namespace Framework\Twig;

/**
 * Description of CsrfExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class CsrfExtension extends \Twig_Extension
{

    /**
     * @var \Framework\Middleware\CsrfMiddleware
     */
    private $csrfMiddleware;

    public function __construct(\Framework\Middleware\CsrfMiddleware $csrfMiddleware)
    {
        $this->csrfMiddleware = $csrfMiddleware;
    }
    
    public function getFunctions()
    {
        return [
          new \Twig_SimpleFunction('csrf_input', [$this,'csrfInput'], ['is_safe'=>['html']])
          ];
    }
    
    public function csrfInput()
    {
        return '<input type ="hidden" name="'.$this->csrfMiddleware->getFormKey().'" value="'.$this->csrfMiddleware->generateToken().'" />';
    }
}
