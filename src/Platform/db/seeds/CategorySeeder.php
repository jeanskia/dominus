<?php


use Phinx\Seed\AbstractSeed;

class CategorySeeder extends AbstractSeed
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
        $categoties = $this->getCategories();
        $data =[];
        foreach ($categoties as $category) {
            $data[]=[
                'name'=>$category['lib_cat']
            ];
        }
        
        $this->table('category')
                ->insert($data)
                ->save();
    }
    
    private function getCategories()
    {
        return [
          ['id_cat' => '11','lib_cat' => 'A'],
          ['id_cat' => '12','lib_cat' => 'B'],
          ['id_cat' => '13','lib_cat' => 'Cadre expérimenté'],
          ['id_cat' => '14','lib_cat' => 'Cadre supérieur'],
          ['id_cat' => '15','lib_cat' => 'Cadre Moyen confirmé'],
          ['id_cat' => '16','lib_cat' => 'Cadre Moyen débutant'],
          ['id_cat' => '17','lib_cat' => 'Cadre débutant'],
          ['id_cat' => '18','lib_cat' => 'Agent d’exécution spécialisé expérimenté'],
          ['id_cat' => '19','lib_cat' => 'Agent d’exécution Spécialisé '],
          ['id_cat' => '20','lib_cat' => 'Agent d’Exécution confirmé'],
          ['id_cat' => '21','lib_cat' => 'Agent d’Exécution débutant'],
          ['id_cat' => '22','lib_cat' => 'N/A']
            ];
    }
}
