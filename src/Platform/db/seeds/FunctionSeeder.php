<?php


use Phinx\Seed\AbstractSeed;

class FunctionSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $functions = $this->getFunction();
        $data = [];
        
        foreach ($functions as $function) {
            $data [] = [
                'name'=>$function['lib_fonct']
            ];
        }
        
        $this->table('function')
                ->insert($data)
                ->save();
    }
    
    private function getFunction()
    {
        return [
            ['id_fonct' => '1','lib_fonct' => 'Directeur Générale'],
            ['id_fonct' => '2','lib_fonct' => 'Sous-Directeur'],
            ['id_fonct' => '3','lib_fonct' => 'Chef de Service'],
            ['id_fonct' => '5','lib_fonct' => 'Chargé d\'Etudes'],
            ['id_fonct' => '6','lib_fonct' => 'agent']
           ];
    }
}
