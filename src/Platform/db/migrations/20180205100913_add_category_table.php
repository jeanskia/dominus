<?php


use Phinx\Migration\AbstractMigration;

class AddCategoryTable extends AbstractMigration
{
   
    public function change()
    {
        $this->table('category')
             ->addColumn('name', 'string')
             ->create();
    }
}
