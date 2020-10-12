<?php

namespace App\Mission\Table;

use Framework\Database\Table;
use App\Mission\Entity\ParticipateInMission;
use PDO;

/**
 * Description of ParticipateInMission
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class ParticipateInMissionTable extends Table
{
    
    protected $table = 'participate_in_mission';
    
    protected $entity = ParticipateInMission::class;
    
    /**
     * retourne la liste des agents participant à une mission dont l'id est $id_mission
     *
     * @param int $id_mission id de la mission
     * @return array
     */
    public function getParticipant(int $id_mission)
    {
        $query = $this->getPdo()->prepare("SELECT participant.id ,participant.executed_on,a.id as agent_id,a.name as name,a.first_name as first_name,m.id as mission_id "
                                      . "FROM {$this->table} as participant "
                                      . "INNER JOIN agents as a ON participant.agent_id = a.id "
                                      . "INNER JOIN mission as m ON participant.mission_id = m.id "
                                      . "WHERE participant.mission_id = ? ");
        $query->execute([$id_mission]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        return $query->fetchAll();
    }
}
