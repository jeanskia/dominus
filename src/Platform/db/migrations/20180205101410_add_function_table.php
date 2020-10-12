<?php


use Phinx\Migration\AbstractMigration;

class AddFunctionTable extends AbstractMigration
{
    
    public function change()
    {
        $this->table('function')
             ->addColumn('name', 'string')
             ->create();
    }
}
