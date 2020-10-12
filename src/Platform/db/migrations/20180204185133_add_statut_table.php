<?php


use Phinx\Migration\AbstractMigration;

class AddStatutTable extends AbstractMigration
{
    
    public function change()
    {
        $this->table('statuts')
                ->addColumn('name', 'string', ['null'=>true])
                ->create();
    }
}
