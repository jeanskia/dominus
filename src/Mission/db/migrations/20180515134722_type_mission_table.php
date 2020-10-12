<?php


use Phinx\Migration\AbstractMigration;

class TypeMissionTable extends AbstractMigration
{
   
    public function change()
    {
        $this->table('type_mission')
                ->addColumn('name', 'string')
                ->create();
    }
}
