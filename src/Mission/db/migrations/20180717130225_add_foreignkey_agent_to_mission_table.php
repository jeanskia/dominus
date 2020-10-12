<?php


use Phinx\Migration\AbstractMigration;

class AddForeignkeyAgentToMissionTable extends AbstractMigration
{
   
    public function change()
    {
         $this->table('mission')
                ->addColumn('upper_hierarchy_id', 'integer', ['null'=>true])
                ->addForeignKey('upper_hierarchy_id', 'agents', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
                ->update();
    }
}
