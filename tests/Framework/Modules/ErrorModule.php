<?php
namespace Tests\Framework\Modules;
use Framework\Router;

/**
 * Description of ErrorModule
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class ErrorModule {
  
    public function __construct(Router $router) {
        $router->get('/demo', function(){
                                return new \stdClass();}, 'demo') ;
    }
}
