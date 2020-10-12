<?php
namespace App\Platform\Table;

use App\Platform\Entity\Agent;
use Framework\Database\Table;
use PDO;

/**
 * Description of PostTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class AgentTable extends Table
{
    
    protected $entity = Agent::class;
    
    protected $table = 'agents';
    
    /**
     * retourne la liste des agents
     *
     * @param int $perPage
     * @param int $currentPage
     * @return type
     */
    public function findPaginatedIndex(int $perPage, int $currentPage)
    {
        $query = "SELECT * FROM {$this->table} ORDER BY name ASC ";
        return $this->findPaginated($perPage, $currentPage, $query);
    }
    
    public function findPaginatedFonctionnaire(int $perPage, int $currentPage)
    {
        $query = $this->getfonctionnaire();
        return $this->findPaginated($perPage, $currentPage, $query);
    }
    
    public function findPaginatedContractual(int $perPage, int $currentPage)
    {
        $query = $this->getContractual();
        return $this->findPaginated($perPage, $currentPage, $query);
    }
    
    public function getDirector()
    {
        $statement = $this->getPdo()->query("SELECT a.id,a.name,a.first_name "
                                        . "FROM {$this->table} as a "
                                        . "INNER JOIN profession as p ON a.profession_id = p.id "
                                        . "INNER JOIN function as f ON a.function_id = f.id "
                                        . "WHERE f.name = 'Directeur Générale' OR f.name = 'Sous-Directeur' "
                                        . "ORDER BY a.name ASC ");
        $agents = $statement->fetchAll(PDO::FETCH_NUM);
        $list = [];
        foreach ($agents as $agent) {
            $list[$agent[0]] = $agent[1].' '.$agent[2];
        }
        return $list;
    }

    /**
     * retourn la liste des agents Contractuels
     *
     * @return array
     */
    private function getContractual()
    {
        return "SELECT a.id,a.name,a.first_name,a.slug,a.registration,serv.name as service,p.name as profession "
                                    . "FROM {$this->table} as a "
                                    . "INNER JOIN statuts as s ON a.status_id = s.id "
                                    . "INNER JOIN services as serv ON a.service_id = serv.id "
                                    . "INNER JOIN profession as p ON a.profession_id = p.id "
                                    . "WHERE s.name = 'contractuel' "
                                    . "ORDER BY name ASC ";
    }
    
    /**
     * retourne la liste des agents fonctionnaire
     * @return array
     */
    private function getfonctionnaire()
    {
        return "SELECT a.id,a.name,a.first_name,a.slug,a.registration,serv.name as service,p.name as profession "
                                    . "FROM {$this->table} as a "
                                    . "INNER JOIN statuts as s ON a.status_id = s.id "
                                    . "INNER JOIN services as serv ON a.service_id = serv.id "
                                    . "INNER JOIN profession as p ON a.profession_id = p.id "
                                    . "WHERE s.name = 'fonctionnaire' "
                                    . "ORDER BY name ASC ";
    }

    /**
     * retourn les informations sur un agent
     *
     * @param type $id
     * @return type
     */
    public function getInfo($id)
    {
        $query =  $this->getPdo()->prepare("SELECT a.id,a.name,a.first_name,a.slug,registration,place_of_birth,birth_date,"
                    . "father_name,mother_name,contact_emergency,phone1,phone2,e_mail,child,service_taked_at,created_at,updated_at,"
                    . "s.name as statut, serv.name as service,p.name as profession,sex.name as sexe,maried.name as maried,g.name as grade,"
                    . "cat.name as category,funct.name as fonction,d.name as diplome "
                    . "FROM {$this->table} as a "
                    . "INNER JOIN statuts as s ON a.status_id = s.id "
                    . "INNER JOIN services as serv ON a.service_id = serv.id "
                    . "INNER JOIN profession as p ON a.profession_id = p.id "
                    . "INNER JOIN sex ON a.sex_id = sex.id "
                    . "INNER JOIN maritalstatus as maried ON a.maritalstatus_id = maried.id "
                    . "INNER JOIN grade as g ON a.grade_id = g.id "
                    . "INNER JOIN category as cat ON a.category_id = cat.id "
                    . "INNER JOIN function as funct ON a.function_id = funct.id "
                    . "INNER JOIN diploma as d ON a.diploma_id = d.id "
                    . "WHERE a.id = ?");
        $query->execute([$id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        return $query->fetch();
    }
    /**
     * retourne la liste des agents d'un service précis (à utilisé dans le cas d'une liste déroulante)
     *
     * @param int $service_id
     * @return array
     */
    public function getAgentsByService(int $service_id)
    {
        $results = $this->getPdo()->prepare("SELECT a.id,a.name,a.first_name "
                                          . "FROM {$this->table} as a "
                                          . "INNER JOIN services as serv ON a.service_id = serv.id "
                                          . "WHERE serv.id = ? "
                                          . "ORDER BY name ASC ");
        $results->execute([$service_id]);
        $agents = $results->fetchAll(PDO::FETCH_NUM);
        $list = [];
        foreach ($agents as $agent) {
            $list[$agent[0]] = $agent[1].' '.$agent[2];
        }
        return $list;
    }
    /**
     * retourne la liste des agents du service '$sigle'
     *
     * @param type $sigle
     * @return string
     */
    public function getAgentFrom($sigle)
    {
         $results = $this->getPdo()->prepare("SELECT a.id,a.name,a.first_name "
                                          . "FROM {$this->table} as a "
                                          . "INNER JOIN services as serv ON a.service_id = serv.id "
                                          . "WHERE serv.sigle = ? "
                                          . "ORDER BY name ASC ");
        $results->execute([$sigle]);
        $agents = $results->fetchAll(PDO::FETCH_NUM);
        $list = [];
        foreach ($agents as $agent) {
            $list[$agent[0]] = $agent[1].' '.$agent[2];
        }
        return $list;
    }
    
    public function getLastAgent()
    {
        $statement = $this->getPdo()->query("SELECT a.name,a.first_name,registration,p.name as profession,serv.name as service "
                                        . "FROM {$this->table} as a "
                                        . "INNER JOIN profession as p ON a.profession_id = p.id "
                                        . "INNER JOIN services as serv ON a.service_id = serv.id "
                                        . "ORDER BY a.id DESC LIMIT 3 ");
        $agents = $statement->fetchAll();
        return $agents;
    }

    /**
     * retourne la liste des agents qui ont pour emploi 'Chauffeur' l'id correspondant est 11 dans la BDD
     *
     * @return array
     */
    public function getDrivers()
    {
        $results = $this->getPdo()->query("SELECT a.id,a.name,a.first_name "
                                          . "FROM {$this->table} as a "
                                          . "INNER JOIN profession as prof ON a.profession_id = prof.id "
                                          . "WHERE prof.id = 11 "
                                          . "ORDER BY name ASC ")->fetchAll(PDO::FETCH_NUM);
        $list = [];
        foreach ($results as $result) {
            $list[$result[0]] = $result[1].' '.$result[2];
        }
        return $list;
    }
    
    public function countContractuel():int
    {
        return $this->fetchColumn("SELECT COUNT(a.id) "
                                    . "FROM {$this->table} as a "
                                    . "INNER JOIN statuts as s ON a.status_id = s.id "
                                    . "WHERE s.name = 'contractuel' ");
    }
    
    public function countFonctionnaire():int
    {
        return $this->fetchColumn("SELECT COUNT(a.id) "
                                    . "FROM {$this->table} as a "
                                    . "INNER JOIN statuts as s ON a.status_id = s.id "
                                    . "WHERE s.name = 'fonctionnaire' ");
    }
}
