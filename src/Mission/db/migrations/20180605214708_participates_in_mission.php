<?php


use Phinx\Migration\AbstractMigration;

class ParticipatesInMission extends AbstractMigration
{

    public function change()
    {
        $this->table('participate_in_mission')
                ->addColumn('mission_id', 'integer', ['null'=>true])
                ->addColumn('agent_id', 'integer', ['null'=>true])
                ->addColumn('executed_on', 'date')
                ->create();
    }
}
