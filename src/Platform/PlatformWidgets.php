<?php

namespace App\Platform;

use App\Admin\AdminWidgetsInterface;
use App\Platform\Table\AgentTable;
use Framework\Renderer\RendererInterface;

/**
 * Description of PlatformWidgets
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class PlatformWidgets implements AdminWidgetsInterface
{

    /**
     * @var AgentTable
     */
    private $agentTable;

    /**
     * @var RendererInterface
     */
    private $renderer;

    public function __construct(RendererInterface $renderer, AgentTable $agentTable)
    {
        
        $this->renderer = $renderer;
        $this->agentTable = $agentTable;
    }
    
    public function render(): string
    {
        $count = $this->agentTable->count();
        $countc= $this->agentTable->countContractuel();
        $countf = $this->agentTable->countFonctionnaire();
        $recent_up = $this->agentTable->getLastAgent();
        return $this->renderer->render('@platform/admin/widget', compact('count', 'countc', 'countf', 'recent_up'));
    }

    public function renderMenu(): string
    {
        return $this->renderer->render('@platform/admin/main_menu');
    }

    public function renderAdminMenu(): string
    {
        return $this->renderer->render('@platform/admin/admin_menu');
    }
}
