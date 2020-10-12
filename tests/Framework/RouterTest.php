<?php

namespace Tests\Framework;

/**
 * Description of RouterTest
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */

use Framework\Router;
use GuzzleHttp\Psr7\ServerRequest;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase 
{
    
    private $router;


    public function setUp() 
    {
        $this->router = new Router();
    }
    
    public function testGetMethode()
    {
        $request = new ServerRequest('GET', '/blog');
        $this->router->get('/blog',function(){return 'hello';},'blog');
        $route = $this->router->match($request);
        $this->assertEquals('blog', $route->getName());
        $this->assertEquals('hello', call_user_func_array($route->getCallback(),[$request]));
    }
    
    public function testGetMethodeIfURLDoesNotExit()
    {
        $request = new ServerRequest('GET', '/blog');
        $this->router->get('/blogaze',function(){return 'hello';},'/blog');
        $route = $this->router->match($request);
        $this->assertEquals(null, $route);
    }
    
    public function testGetMethodeWithParameter()
    {
        $request = new ServerRequest('GET', '/blog/mon-slug-8');
        $this->router->get('/blog',function(){return 'zaeazea';},'posts');
        $this->router->get('/blog/{slug:[a-z0-9\-]+}-{id:\d+}',function(){return 'hello';},'post.show');
        $route = $this->router->match($request);
        $this->assertEquals('post.show', $route->getName());
        $this->assertEquals('hello', call_user_func_array($route->getCallback(),[$request]));
        $this->assertEquals(['slug'=>'mon-slug','id'=>'8'], $route->getParams());
        //test invalid url
        $route = $this->router->match(new ServerRequest('GET', '/blog/mon-slug-8'));
    }
    
     public function testGenerateUri()
    {
        $this->router->get('/blog',function(){return 'zaeazea';},'/posts');
        $this->router->get('/blog/{slug:[a-z0-9\-]+}-{id:\d+}',function(){return 'hello';},'post.show');
        $uri = $this->router->generateUri('post.show',['slug'=>'mon-article','id'=>'18']);
        $this->assertEquals('/blog/mon-article-18', $uri);
    }
}
