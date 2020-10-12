<?php

namespace Framework\Database;

use Pagerfanta\Pagerfanta;
use PDO;

/**
 * Description of Table
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class Table
{

    /**
     * @var PDO
     */
    private $pdo;
    /**
     * Nom de la table en BDD
     * @var string
     */
    protected $table;
    /**
     * Entité à utiliser
     * @var string
     */
    protected $entity;


    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    /**
     * Pagine des éléments
     *
     * @return Pagerfanta
     */
    public function findPaginated(int $perPage, int $currentPage, $queryRequest): Pagerfanta
    {
        $query = new PaginatedQuery($this->pdo, $queryRequest, "SELECT COUNT(id) FROM {$this->table}");
        return (new Pagerfanta($query))->setMaxPerPage($perPage)->setCurrentPage($currentPage);
    }
    //unuse
    protected function paginationQuery()
    {
        return "SELECT * FROM {$this->table} ORDER BY name ASC ";
    }
    /**
     * Récupère une liste clef valeur de nos enregistrements
     */
    public function findlist():array
    {
        $results = $this->pdo->query("SELECT id,name FROM {$this->table} ORDER BY name ASC ")
                            ->fetchAll(PDO::FETCH_NUM);
        $list = [];
        foreach ($results as $result) {
            $list[$result[0]] = $result[1];
        }
        return $list;
    }
    /**
     * Retourne un tableau contenant toute les lignes d'une table
     *
     * @return array
     */
    public function findAll():array
    {
        $statement = $this->pdo->query("SELECT * FROM {$this->table} ORDER BY name ASC ");
        if ($this->entity) {
            $statement->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        } else {
             $statement->setFetchMode(PDO::FETCH_OBJ);
        }
        return $statement->fetchAll();
    }

    /**
      * Récupère un élément à partire de son ID
      *
      * @param int $id
      * @return mixed
      */
    public function find(int $id)
    {
            $query = $this->pdo
                ->prepare("SELECT * FROM {$this->table} WHERE id = ?");
                $query->execute([$id]);
        if ($this->entity) {
            $query->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        }
        return $query->fetch();
    }
     /**
      * Récupère un élément à partire d'une propriété
      *
      * @param string $property
      * @param string $value
      * @return type
      */
    public function findBy(string $property, string $value)
    {
            $query = $this->pdo
                ->prepare("SELECT * FROM {$this->table} WHERE {$property} = ?");
                $query->execute([$value]);
        if ($this->entity) {
            $query->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        }
        return $query->fetch();
    }
    /**
     * Récupère le nombre d'enregistrement
     *
     * @return int
     */
    public function count():int
    {
        return $this->fetchColumn("SELECT COUNT(id) FROM {$this->table}");
    }

        /**
     * Met à jours un enregistrement au niveau de la base de données
     * @param int $id
     * @param array $params
     */
    public function update(int $id, array $params):bool
    {
        $fieldQuery = $this->buildFieldQuery($params);
        $params["id"]= $id;
        $tatement = $this->pdo->prepare("UPDATE {$this->table} SET $fieldQuery WHERE id=:id");
        return $tatement->execute($params);
    }
    /**
     * Creer un nouvel enregistrement
     * @param array $params
     * @return bool
     */
    public function insert(array $params):bool
    {
        $fields = array_keys($params);
        $value = join(',', array_map(function ($field) {
                    return ':'.$field;
        }, $fields));
        $fields = join(',', $fields);
 //     $fieldQuery = $this->buildFieldQuery($params);
        $tatement = $this->pdo->prepare("INSERT INTO {$this->table}($fields) VALUES ($value) ");
        return $tatement->execute($params);
    }
    /**
     * Supprime un enregistrement
     * @param type $id
     * @return bool
     */
    public function delete($id): bool
    {
        $statement = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ? ");
        return $statement->execute([$id]);
    }

    private function buildFieldQuery($params)
    {
        return join(',', array_map(function ($field) {
                return "$field = :$field";
        }, array_keys($params)));
    }
    /**
     * Retourne une entité
     *
     * @return type
     */
    public function getEntity()
    {
        return $this->entity ;
    }
    /**
     * retourne le nom de d'une Table
     *
     * @return type
     */
    public function getTable()
    {
        return $this->table;
    }
    /**
     * retourne une instance de PDO
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Vérifie si une clef existe au niveau de notre Table en BDD
     *
     * @param type $id
     * @return bool
     */
    public function exists($id):bool
    {
        $statement = $this->pdo->prepare("SELECT id FROM {$this->table} WHERE id = ?");
        $statement->execute([$id]);
        return $statement->fetchColumn()!== false;
    }
    /**
     * Récupère la première column
     *
     * @param string $query
     * @param array $params
     * @return type
     */
    protected function fetchColumn(string $query, array $params = [])
    {
        $query = $this->pdo->prepare($query);
        $query->execute($params);
        if ($this->entity) {
            $query->setFetchMode(PDO::FETCH_CLASS, $this->entity);
        }
        return $query->fetchColumn();
    }
}
