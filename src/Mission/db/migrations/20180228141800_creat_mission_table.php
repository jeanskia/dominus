<?php


use Phinx\Migration\AbstractMigration;

class CreatMissionTable extends AbstractMigration
{
    
    public function change()
    {
        $this->table('mission')
                ->addColumn('name', 'string')
                ->addColumn('location', 'string')
                ->addColumn('slug', 'string')
                ->addColumn('created_at', 'datetime')
                ->addColumn('duration_mission', 'string', ['null'=>true])
                ->addColumn('transport', 'string', ['null'=>true])
                ->addColumn('budget_allocation', 'string', ['null'=>true])
                ->addColumn('start_mission', 'date')
                ->addColumn('end_mission', 'date', ['null'=>true])
              //  ->addColumn('is_valid','boolean',['default'=>'false'])
                ->create();
    }
}
