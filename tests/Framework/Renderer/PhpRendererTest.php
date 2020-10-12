<?php

namespace Tests\Framework\Renderer;

use Framework\Renderer;
use PHPUnit\Framework\TestCase;

/**
 * Description of RendererTest
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class PhpRendererTest extends TestCase {
   
    private $renderer;
    
    public function setUp() {
        $this->renderer = new Renderer\PHPRenderer(__DIR__.'/Views');
    }
    
    public function testRenderTheRightPath(){
        $this->renderer->addPath('blog',__DIR__.'/Views');
        $content = $this->renderer->render('@blog/demo');
        $this->assertEquals('salut la planette', $content);
    }
    
    public function testRenderTheDefaultPath(){
        $content = $this->renderer->render('demo');
        $this->assertEquals('salut la planette', $content);
    }
    
    public function testRenderWithParams(){
        $content = $this->renderer->render('demoparams',['nom'=>'Marc']);
        $this->assertEquals('salut Marc', $content);
    }
    
      public function testGlobalParameters(){
          $this->renderer->addGlobal('nom','marc');
        $content = $this->renderer->render('demoparams',['nom'=>'Marc']);
        $this->assertEquals('salut Marc', $content);
    }
}
