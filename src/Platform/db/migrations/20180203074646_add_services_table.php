<?php


use Phinx\Migration\AbstractMigration;

class AddServicesTable extends AbstractMigration
{
   
    public function change()
    {
        $this->table('services')
                ->addColumn('name', 'string')
                ->addColumn('sigle', 'string', ['null'=>true])
                ->create();
    }
}
