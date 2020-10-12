<?php

use Framework\Middleware\MethodMiddleware;
use GuzzleHttp\Psr7\ServerRequest;
use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\TestCase;

/**
 * Description of MethodMiddlewareTest
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MethodMiddlewareTest extends TestCase {
   
      private $middleware;

    public function setUp() {
        $this->middleware = new MethodMiddleware();
    }
    
    public function letGetRequestPass()
    {
        $delegate = $this->getMockBuilder(DelegateInterface::class)
                                        ->setMethods(['process'])
                                        ->getMock();
        
        $delegate->expects($this->once())
                ->method('process')
                ->with($this->callback(function($request){
                    return $request->getMethod() === 'DELETE';
                }));
        
        $request = (new ServerRequest('POST', '/demo'))
                    ->withParsedBody(['_Method'=>'DELETE']);
            $this->middleware->process($request, $delegate);               
    }
}
