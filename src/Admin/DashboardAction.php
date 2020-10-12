<?php

namespace App\Admin;

use Framework\Renderer\RendererInterface;

/**
 * Description of DashboardAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class DashboardAction
{

    /**
     * @var array
     */
    private $widgets;

    /**
     * @var AdminWidgetsInterface []
     */
    private $renderer;

    public function __construct(RendererInterface $renderer, array $widgets)
    {
        $this->renderer = $renderer;
        $this->widgets = $widgets;
    }
    
    public function __invoke()
    {
        $widgets = array_reduce($this->widgets, function (string $html, AdminWidgetsInterface $widget) {
            return $html . $widget->render();
        }, '');
        return $this->renderer->render('@admin/dashboard', compact('widgets'));
    }
}
