<?php


use Phinx\Migration\AbstractMigration;

class AddDiplomaTable extends AbstractMigration
{
  
    public function change()
    {
        $this->table('diploma')
             ->addColumn('name', 'string')
             ->create();
    }
}
