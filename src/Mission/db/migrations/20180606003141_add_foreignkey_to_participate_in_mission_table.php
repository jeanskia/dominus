<?php


use Phinx\Migration\AbstractMigration;

class AddForeignkeyToParticipateInMissionTable extends AbstractMigration
{
    public function change()
    {
        $this->table('participate_in_mission')
                ->addForeignKey('mission_id', 'mission', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
                ->addForeignKey('agent_id', 'agents', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
                ->update();
    }
}
