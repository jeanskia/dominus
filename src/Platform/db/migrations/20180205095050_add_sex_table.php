<?php


use Phinx\Migration\AbstractMigration;

class AddSexTable extends AbstractMigration
{
   
    public function change()
    {
        $this->table('sex')
             ->addColumn('name', 'string')
             ->create();
    }
}
