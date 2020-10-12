<?php


use Phinx\Migration\AbstractMigration;

class CreateAgentsTable extends AbstractMigration
{
    
    public function change()
    {
        $this->table('agents')
                ->addColumn('registration', 'string', ['null'=>true])
                ->addColumn('name', 'string')
                ->addColumn('first_name', 'string')
                ->addColumn('slug', 'string')
                ->addColumn('place_of_birth', 'string', ['null'=>true])
                ->addColumn('birth_date', 'date', ['null'=>true])
                ->addColumn('father_name', 'string', ['null'=>true])
                ->addColumn('mother_name', 'string', ['null'=>true])
                ->addColumn('contact_emergency', 'string', ['null'=>true])
                ->addColumn('phone1', 'string', ['null'=>true])
                ->addColumn('phone2', 'string', ['null'=>true])
                ->addColumn('e_mail', 'string', ['null'=>true])
                ->addColumn('child', 'string', ['null'=>true])
                ->addColumn('service_taked_at', 'date', ['null'=>true])
                ->addColumn('created_at', 'datetime')
                ->addColumn('updated_at', 'datetime', ['null'=>true])
                ->create();
    }
}
