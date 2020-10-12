<?php


use Phinx\Seed\AbstractSeed;

class ProfessionSeeder extends AbstractSeed
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
        $professions = $this->getProfessions();
        $data = [];
        
        foreach ($professions as $profession) {
            $data [] = [
                'name'=>$profession['lib_prof']
            ];
        }
        $this->table('profession')
                ->insert($data)
                ->save();
    }
    
    private function getProfessions()
    {
        return [
        ['id_prof' => '1','lib_prof' => 'Technicienne Supérieure en Informatique'],
        ['id_prof' => '2','lib_prof' => 'Attaché administratif'],
        ['id_prof' => '3','lib_prof' => 'Ingénieur génie sanitaire et environnement'],
        ['id_prof' => '4','lib_prof' => 'Assistant comptable'],
        ['id_prof' => '5','lib_prof' => 'ingénieur marketing'],
        ['id_prof' => '6','lib_prof' => 'Attaché des Finances'],
        ['id_prof' => '7','lib_prof' => 'Professeur de Lycée Professionnel'],
        ['id_prof' => '8','lib_prof' => 'Économiste'],
        ['id_prof' => '9','lib_prof' => 'Technicien en Mécanique '],
        ['id_prof' => '10','lib_prof' => 'Attaché de recherche'],
        ['id_prof' => '11','lib_prof' => 'Chauffeur '],
        ['id_prof' => '12','lib_prof' => 'Géographe '],
        ['id_prof' => '13','lib_prof' => 'Ingénieur des Techniques des Eaux et Forêts'],
        ['id_prof' => '14','lib_prof' => 'Technicien supérieur en comptabilité et finance '],
        ['id_prof' => '15','lib_prof' => 'Maître assistant de conférence et chercheur'],
        ['id_prof' => '16','lib_prof' => 'Secrétaire Assistant(e) comptable'],
        ['id_prof' => '17','lib_prof' => 'Technicien supérieur de la santé '],
        ['id_prof' => '18','lib_prof' => 'Ingénieur Eaux et Forêts'],
        ['id_prof' => '19','lib_prof' => 'Secrétaire Administratif'],
        ['id_prof' => '20','lib_prof' => 'Ingénieur des Techniques des Travaux Publics'],
        ['id_prof' => '21','lib_prof' => 'Secrétaire Assistant(e) de Direction'],
        ['id_prof' => '22','lib_prof' => 'Ingénieur des techniques sanitaires
'],
        ['id_prof' => '23','lib_prof' => 'Conseiller pédagogique'],
        ['id_prof' => '24','lib_prof' => 'Administrateur principal des services financiers'],
        ['id_prof' => '26','lib_prof' => 'Secrétaire de direction'],
        ['id_prof' => '27','lib_prof' => 'Technicien Supérieur en Communication d\'Entreprise '],
        ['id_prof' => '28','lib_prof' => 'N/A'],
        ['id_prof' => '29','lib_prof' => 'Ingénieur Agronome'],
        ['id_prof' => '30','lib_prof' => 'Juriste'],
        ['id_prof' => '31','lib_prof' => 'Technicien Supérieur en Environnement'],
        ['id_prof' => '32','lib_prof' => 'Sociologue'],
        ['id_prof' => '33','lib_prof' => 'Lettre Moderne'],
        ['id_prof' => '34','lib_prof' => 'Technicien Supérieur en Mine, Géologie et Pétrole'],
        ['id_prof' => '35','lib_prof' => 'Technicien Supérieur en Sécurité-Prévention'],
        ['id_prof' => '36','lib_prof' => 'Technicien Supérieur en Génie Thermique '],
        ['id_prof' => '37','lib_prof' => 'Adjoint administratif'],
        ['id_prof' => '38','lib_prof' => 'Assistant de Production Animal et Vegetal Option eaux et Foret'],
        ['id_prof' => '39','lib_prof' => 'Moniteur de Production Animal et Vegetal Option eaux et Foret']
        ];
    }
}
