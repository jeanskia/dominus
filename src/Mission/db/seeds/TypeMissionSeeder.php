<?php


use Phinx\Seed\AbstractSeed;

class TypeMissionSeeder extends AbstractSeed
{
    
    public function run()
    {
        $types = $this->getTypeMission();
        $data = [];
        
        foreach ($types as $type) {
            $data[] = [
                'name'=>$type['lib_typeMission']
            ];
        }
        $this->table('type_mission')
                ->insert($data)
                ->save();
    }
    
    private function getTypeMission()
    {
        return [
        ['lib_typeMission' => 'Visites de Site'],
        ['lib_typeMission' => 'Réunions publiques'],
        ['lib_typeMission' => 'Préparation d\'enquêtes publiques'],
        ['lib_typeMission' => 'Enquêtes publiques'],
        ['lib_typeMission' => 'Vérification de conformité réglementaire'],
        ['lib_typeMission' => 'Constat de cas de pollution'],
        ['lib_typeMission' => 'Suivi CGES'],
        ['lib_typeMission' => 'Suivi PGES'],
        ['lib_typeMission' => 'Mise en oeuvre du plan d\'actions']
            ];
    }
}
