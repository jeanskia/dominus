<?php


use Phinx\Seed\AbstractSeed;

class DiplomaSeeder extends AbstractSeed
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
        $diplomas = $this->getDiploma();
        $data = [];
        
        foreach ($diplomas as $diploma) {
            $data[]=  [
                'name'=>$diploma['lib_diplome']
            ];
        }
        $this->table('diploma')
                ->insert($data)
                ->save();
    }
    
    private function getDiploma()
    {
        return [
            ['id_diplome' => '1','lib_diplome' => 'Maîtrise de Sciences de Gestion'],
        ['id_diplome' => '2','lib_diplome' => 'DUT finances'],
        ['id_diplome' => '3','lib_diplome' => 'Ingénieur Marketing'],
        ['id_diplome' => '4','lib_diplome' => 'Maîtrise Science économiques'],
        ['id_diplome' => '5','lib_diplome' => 'BTS finance-comptabilité'],
        ['id_diplome' => '6','lib_diplome' => 'BT Mécanique'],
        ['id_diplome' => '7','lib_diplome' => 'BEPC'],
        ['id_diplome' => '8','lib_diplome' => 'Licence en Géographie'],
        ['id_diplome' => '9','lib_diplome' => 'Ingénieur Agronome'],
        ['id_diplome' => '10','lib_diplome' => 'Maîtrise de droit'],
        ['id_diplome' => '11','lib_diplome' => 'Permis de conduire '],
        ['id_diplome' => '12','lib_diplome' => 'BTS Environnement et cadre de vie'],
        ['id_diplome' => '13','lib_diplome' => 'BTS Communication d\'entreprise'],
        ['id_diplome' => '15','lib_diplome' => 'Maîtrise en Géographie'],
        ['id_diplome' => '16','lib_diplome' => 'Maîtrise de Sociologie de l\'environnement'],
        ['id_diplome' => '17','lib_diplome' => 'Maîtrise Appliquée, option Lettre Moderne'],
        ['id_diplome' => '18','lib_diplome' => 'Licence en Lettres Modernes'],
        ['id_diplome' => '19','lib_diplome' => 'BTS Mine, Géologie, Pétrole'],
        ['id_diplome' => '20','lib_diplome' => 'BTS Sécurité-Incendie et Prévention'],
        ['id_diplome' => '21','lib_diplome' => 'BTS Gestion de l’environnement'],
        ['id_diplome' => '22','lib_diplome' => 'BTS Génie Thermique '],
        ['id_diplome' => '23','lib_diplome' => 'BTS Informatique Développeur d\'application'],
        ['id_diplome' => '24','lib_diplome' => 'N/A'],
        ['id_diplome' => '25','lib_diplome' => 'N/F']
            ];
    }
}
