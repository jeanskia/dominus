<?php


use Phinx\Migration\AbstractMigration;

class AddMaritalstatusTable extends AbstractMigration
{
    
    public function change()
    {
        $this->table('maritalstatus')
             ->addColumn('name', 'string')
             ->create();
    }
}
