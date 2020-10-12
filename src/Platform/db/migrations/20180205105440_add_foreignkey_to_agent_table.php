<?php


use Phinx\Migration\AbstractMigration;

class AddForeignkeyToAgentTable extends AbstractMigration
{
    
    public function change()
    {
        $this->table('agents')
             ->addColumn('service_id', 'integer', ['null'=>true])
             ->addColumn('status_id', 'integer', ['null'=>true])
             ->addColumn('sex_id', 'integer', ['null'=>true])
             ->addColumn('maritalstatus_id', 'integer', ['null'=>true])
             ->addColumn('grade_id', 'integer', ['null'=>true])
             ->addColumn('category_id', 'integer', ['null'=>true])
             ->addColumn('function_id', 'integer', ['null'=>true])
             ->addColumn('profession_id', 'integer', ['null'=>true])
             ->addColumn('diploma_id', 'integer', ['null'=>true])
             ->addForeignKey('service_id', 'services', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('status_id', 'statuts', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('sex_id', 'sex', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('maritalstatus_id', 'maritalstatus', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('grade_id', 'grade', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('category_id', 'category', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('function_id', 'function', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('profession_id', 'profession', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->addForeignKey('diploma_id', 'diploma', 'id', ['delete'=>'SET NULL','update'=>'CASCADE'])
             ->update();
    }
}
