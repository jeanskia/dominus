<?php

namespace App\Auth;

use Framework\Auth;
use Twig_Extension;

/**
 * Description of AuthTwigExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class AuthTwigExtension extends Twig_Extension
{

    /**
     * @var Auth
     */
    private $auth;

    public function __construct(Auth $auth)
    {
        
        $this->auth = $auth;
    }
    
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('current_user', [$this->auth,'getUser'])
        ];
    }
}
