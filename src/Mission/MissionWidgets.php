<?php

namespace App\Mission;

use App\Admin\AdminWidgetsInterface;
use App\Mission\Table\MissionTable;
use Framework\Renderer\RendererInterface;

/**
 * Description of PlatformWidgets
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MissionWidgets implements AdminWidgetsInterface
{

    /**
     * @var MissionTable
     */
    private $missionTable;

    /**
     * @var RendererInterface
     */
    private $renderer;

    public function __construct(RendererInterface $renderer, MissionTable $missionTable)
    {
        $this->renderer = $renderer;
        $this->missionTable = $missionTable;
    }
    
    public function render(): string
    {
        $stat = $this->missionTable->getStat();
        $current_month = $this->missionTable->getTotalMissionOfTheMonth();
        $EIES = $this->missionTable->getStatEIES();
        $EES = $this->missionTable->getStatEES();
        $AE = $this->missionTable->getStatAE();
        return $this->renderer->render('@mission/admin/widget', compact('stat', 'current_month', 'EIES', 'EES', 'AE'));
    }

    public function renderMenu(): string
    {
        return $this->renderer->render('@mission/admin/main_menu');
    }
    
    public function renderAdminMenu():string
    {
        return $this->renderer->render('@mission/admin/admin_menu');
    }
}
