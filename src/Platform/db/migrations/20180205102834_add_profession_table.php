<?php


use Phinx\Migration\AbstractMigration;

class AddProfessionTable extends AbstractMigration
{
  
    public function change()
    {
        $this->table('profession')
             ->addColumn('name', 'string')
             ->create();
    }
}
