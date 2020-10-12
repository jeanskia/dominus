<?php


use Phinx\Seed\AbstractSeed;

class ServiceSeeder extends AbstractSeed
{

    public function run()
    {
        $services = $this->getService();
        $data = [];
        
        foreach ($services as $service) {
            $data[] = [
                "name"=>$service['lib_serv'],
                "sigle"=>$service['sigle']
                    ];
        }
        
        $services = $this->table('services')
                         ->insert($data)
                         ->save();
    }
    
    private function getService()
    {
        return  [
        ['id_serv' => '1','lib_serv' => 'Informatique','id_sous_direction' => '5','sigle' => ''],
        ['id_serv' => '2','lib_serv' => 'Communication ','id_sous_direction' => '5','sigle' => ''],
        ['id_serv' => '3','lib_serv' => 'Mécanisme pour le Développement Propre','id_sous_direction' => '5','sigle' => 'MDP'],
        ['id_serv' => '4','lib_serv' => 'Agence Comptable','id_sous_direction' => '5','sigle' => 'AC'],
        ['id_serv' => '5','lib_serv' => 'Contrôle Budgétaire','id_sous_direction' => '5','sigle' => 'CB'],
        ['id_serv' => '6','lib_serv' => 'Juridique','id_sous_direction' => '5','sigle' => ''],
        ['id_serv' => '7','lib_serv' => 'Budget et Facturation','id_sous_direction' => '1','sigle' => ''],
        ['id_serv' => '8','lib_serv' => 'RICI','id_sous_direction' => '1','sigle' => ''],
        ['id_serv' => '9','lib_serv' => 'Ressources Humaines et Formations','id_sous_direction' => '1','sigle' => ''],
        ['id_serv' => '10','lib_serv' => 'Patrimoine et Passation des Marchés','id_sous_direction' => '1','sigle' => ''],
        ['id_serv' => '25','lib_serv' => 'S/D AERI','id_sous_direction' => '2','sigle' => ''],
        ['id_serv' => '27','lib_serv' => 'Etude d\'Impact Environnemental et Social','id_sous_direction' => '3','sigle' => 'EIES'],
        ['id_serv' => '28','lib_serv' => 'Audit Environnemental','id_sous_direction' => '3','sigle' => 'AE'],
        ['id_serv' => '29','lib_serv' => 'Suivi Environnemental et Social','id_sous_direction' => '3','sigle' => ''],
        ['id_serv' => '30','lib_serv' => 'Evaluation Environnementale Stratégique','id_sous_direction' => '3','sigle' => 'EES'],
        ['id_serv' => '31','lib_serv' => 'Direction Générale','id_sous_direction' => '5','sigle' => 'DG'],
        ['id_serv' => '32','lib_serv' => 'Agents de la Direction Générale','id_sous_direction' => '5','sigle' => ''],
        ['id_serv' => '33','lib_serv' => 'N/A','id_sous_direction' => '6','sigle' => ''],
        ['id_serv' => '34','lib_serv' => 'S/D PSEP','id_sous_direction' => '4','sigle' => 'PSEP']
        ];
    }
}
