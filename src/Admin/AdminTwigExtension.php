<?php

namespace App\Admin;

/**
 * Description of AdminTwigExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class AdminTwigExtension extends \Twig_Extension
{

    /**
     * @var array
     */
    private $widgets;

    public function __construct(array $widgets)
    {
        $this->widgets = $widgets;
    }
    
    public function getFunctions()
    {
        return [
          new \Twig_SimpleFunction('main_menu', [$this,'renderMenu'], ['is_safe'=>['html']]),
          new \Twig_SimpleFunction('admin_menu', [$this,'renderAdminMenu'], ['is_safe'=>['html']])
        ];
    }
    
    public function renderMenu():string
    {
        return array_reduce($this->widgets, function (string $html, AdminWidgetsInterface $widget) {
            return $html . $widget->renderMenu();
        }, '');
    }
    
    public function renderAdminMenu():string
    {
        return array_reduce($this->widgets, function (string $html, AdminWidgetsInterface $widget) {
            return $html . $widget->renderAdminMenu();
        }, '');
    }
}
