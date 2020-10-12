<?php


use Phinx\Migration\AbstractMigration;

class AddGradeTable extends AbstractMigration
{
 
    public function change()
    {
        $this->table('grade')
             ->addColumn('name', 'string')
             ->create();
    }
}
