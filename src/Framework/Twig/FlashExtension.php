<?php
namespace Framework\Twig ;

use Framework\Session\FlashService;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Description of FlashExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class FlashExtension extends Twig_Extension
{
    /**
     *
     * @var FlashService
     */
    private $flashService;
    
    public function __construct(FlashService $flashService)
    {
        $this->flashService = $flashService ;
    }
    
    public function getFunctions(): array
    {
        
        return [
            new Twig_SimpleFunction('flash', [$this,'getFlash'])
        ];
    }
    
    public function getFlash($type)
    {
        return $this->flashService->get($type);
    }
}
