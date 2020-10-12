<?php
namespace Framework\Database;

use Pagerfanta\Adapter\AdapterInterface;

/**
 * Description of PaginatedQuery
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class PaginatedQuery implements AdapterInterface
{
    
    private $pdo;
    
    private $querry;
    
    private $countQuery;
    
    /**
     *
     * @param \PDO $pdo
     * @param string $query Requête permettant de récupérer X résultats
     * @param string $countQuery Requête permetant de compter le nombre de résultat
     */
    public function __construct(\PDO $pdo, string $query, string $countQuery)
    {
        $this->pdo = $pdo;
        $this->querry = $query;
        $this->countQuery = $countQuery;
    }
    /**
     * Returns the number of results.
     *
     * @return integer The number of results.
     */
    public function getNbResults(): int
    {
        return $this->pdo->query($this->countQuery)->fetchColumn();
    }
    /**
     * Returns an slice of the results.
     *
     * @param integer $offset The offset.
     * @param integer $length The length.
     *
     * @return array|\Traversable The slice.
     */
    public function getSlice($offset, $length)
    {
       
        $tatement = $this->pdo->prepare($this->querry.' LIMIT :offset,:length');
        $tatement->bindParam('offset', $offset, \PDO::PARAM_INT);
        $tatement->bindParam('length', $length, \PDO::PARAM_INT);
        $tatement->execute();
        return $tatement->fetchAll();
    }
}
