<?php
namespace App\Mission\Table;

use App\Mission\Entity\Mission;
use Framework\Database\Table;
use PDO;

/**
 * Description of MissionTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MissionTable extends Table
{
    /**
     * Nom de la table en BDD
     * @var string
     */
    protected $table = 'mission';
    /**
     * Entité à utiliser
     * @var string
     */
    protected $entity = Mission::class;
    
    public function test()
    {
        $pdo = $this->getPdo() ;
        $query = $pdo->query("SELECT * FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'platform_ande'");
        return $query->fetchAll();
    }
    /**
     * renvoie les information sur une mission
     *
     * @param int $id
     * @return array
     */
    public function getDetails(int $id)
    {
        $query =  $this->getPdo()->prepare("SELECT m.id,m.name,location,m.slug,created_at,duration_mission,"
                    ." transport,budget_allocation,start_mission,end_mission,t.name as type_mission,serv.name as service  "
                    . "FROM {$this->table} as m "
                    . "INNER JOIN type_mission as t ON m.type_mission_id = t.id "
                    . "INNER JOIN services as serv ON m.service_id = serv.id "
                    . "WHERE m.id = ? AND m.type_mission_id = t.id AND m.service_id = serv.id");
        $query->execute([$id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        return $query->fetch();
    }
    /**
     * renvoie la liste des missions du mois de l'année en cours
     * @return array
     */
    public function getMissionOfTheMonth()
    {
        $statement = $this->getPdo()->query("SELECT * "
                    . "FROM {$this->table} "
                    . "WHERE MONTH(start_mission) = MONTH(CURRENT_DATE()) "
                    . "AND YEAR(start_mission) = YEAR(CURRENT_DATE())"
                    . "ORDER BY start_mission DESC");
        return $statement->fetchAll();
    }
    
    /**
     * renvoie le des missions du mois de l'année en cours
     * @return array
     */
    public function getTotalMissionOfTheMonth()
    {
          return $this->fetchColumn("SELECT count(id) "
                    . "FROM {$this->table} "
                    . "WHERE MONTH(start_mission) = MONTH(CURRENT_DATE()) "
                    . "AND YEAR(start_mission) = YEAR(CURRENT_DATE())");
    }
    /**
     * renvoie le nombre de missions du mois de l'année en cours exécuter par le service EIES
     * @return array
     */
    public function getStatEIES()
    {
        return $this->fetchColumn("SELECT count(m.id) "
                    . "FROM {$this->table} as m "
                    . "INNER JOIN services as serv ON m.service_id = serv.id "
                    . "WHERE MONTH(start_mission) = MONTH(CURRENT_DATE()) "
                    . "AND YEAR(start_mission) = YEAR(CURRENT_DATE()) "
                    . "AND serv.sigle = 'EIES' ");
    }
    /**
     *renvoie le nombre de missions du mois de l'année en cours exécuter par le service EES
     * @return array
     */
    public function getStatEES()
    {
        return $this->fetchColumn("SELECT count(m.id) "
                    . "FROM {$this->table} as m "
                    . "INNER JOIN services as serv ON m.service_id = serv.id "
                    . "WHERE MONTH(start_mission) = MONTH(CURRENT_DATE()) "
                    . "AND YEAR(start_mission) = YEAR(CURRENT_DATE()) "
                    . "AND serv.sigle = 'EES' ");
    }
    /**
     *renvoie le nombre de missions du mois de l'année en cours exécuter par le service AE
     * @return array
     */
    public function getStatAE()
    {
        return $this->fetchColumn("SELECT count(m.id) "
                    . "FROM {$this->table} as m "
                    . "INNER JOIN services as serv ON m.service_id = serv.id "
                    . "WHERE MONTH(start_mission) = MONTH(CURRENT_DATE()) "
                    . "AND YEAR(start_mission) = YEAR(CURRENT_DATE()) "
                    . "AND serv.sigle = 'AE' ");
    }
    /**
     * retourn le nombre de mission executé par mois de l'année en cours
     * @return type
     */
    public function getStat()
    {
         $statement = $this->getPdo()->query("SELECT COUNT(id) as num,MONTHNAME(start_mission) as month "
                    . "FROM {$this->table} "
                    . "WHERE YEAR(start_mission) = YEAR(CURRENT_DATE())"
                    . "GROUP BY MONTH(start_mission)");
        return $statement->fetchAll();
    }
}
