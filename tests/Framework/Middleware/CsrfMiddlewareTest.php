<?php

use PHPUnit\Framework\TestCase;

/**
 * Description of CsrfMiddlewareTest
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class CsrfMiddlewareTest extends TestCase {

    private $middleware;
    private $session;

    public function setUp() {
        $this->session = [];
        $this->middleware = new Framework\Middleware\CsrfMiddleware($this->session);
    }
    
    public function testLetGetRequestPass()
    {
        $delegate = $this->getMockBuilder(\Interop\Http\ServerMiddleware\DelegateInterface::class)
                                        ->setMethods(['process'])
                                        ->getMock();
        
        $delegate->expects($this->once())
                ->method('process')
                ->willReturn(new GuzzleHttp\Psr7\Response());
        
        $request = (new \GuzzleHttp\Psr7\ServerRequest('GET', '/demo'));
            $this->middleware->process($request, $delegate);               
    }
    
    public function testBlockPostWithouCsrf()
    {
        $delegate = $this->getMockBuilder(\Interop\Http\ServerMiddleware\DelegateInterface::class)
                                        ->setMethods(['process'])
                                        ->getMock();
        
        $delegate->expects($this->never())->method('process');
        
        $request = (new \GuzzleHttp\Psr7\ServerRequest('POST', '/demo'));
        $this->expectException(exception::class);
            $this->middleware->process($request, $delegate);               
    }
    
    public function testLetPostWithTokenPassCsrf()
    {
        $delegate = $this->getMockBuilder(\Interop\Http\ServerMiddleware\DelegateInterface::class)
                                        ->setMethods(['process'])
                                        ->getMock();
        
        $delegate->expects($this->once())->method('process')
                ->willReturn(new GuzzleHttp\Psr7\Response());
        
        $request = (new \GuzzleHttp\Psr7\ServerRequest('POST', '/demo'));
        $token = $this->middleware->generateToken();
        $request = $request->withParsedBody(['_csrf'=>$token]);
        $this->middleware->process($request, $delegate);               
    }
    
    public function testBlockPostRequestWithInvalidCsrf()
    {
        $delegate = $this->getMockBuilder(\Interop\Http\ServerMiddleware\DelegateInterface::class)
                                        ->setMethods(['process'])
                                        ->getMock();
        
        $delegate->expects($this->never())->method('process');
        
        $request = (new \GuzzleHttp\Psr7\ServerRequest('GET', '/demo'));
        $token = $this->middleware->generateToken();
        $request = $request->withParsedBody(['_csrf'=>'azeze']);
        $this->middleware->process($request, $delegate);               
    }

}
