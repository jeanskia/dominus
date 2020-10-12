<?php


use Phinx\Migration\AbstractMigration;

class AddForeignkeyServiceToMissionTable extends AbstractMigration
{
  
    public function change()
    {
         $this->table('mission')
                ->addColumn('service_id', 'integer', ['null'=>true])
                ->addForeignKey('service_id', 'services', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
                ->update();
    }
}
