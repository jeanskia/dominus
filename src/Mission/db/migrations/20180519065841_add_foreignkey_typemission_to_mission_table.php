<?php


use Phinx\Migration\AbstractMigration;

class AddForeignkeyTypemissionToMissionTable extends AbstractMigration
{
   
    public function change()
    {
        $this->table('mission')
                ->addColumn('type_mission_id', 'integer', ['null'=>true])
                ->addForeignKey('type_mission_id', 'type_mission', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
                ->update();
    }
}
