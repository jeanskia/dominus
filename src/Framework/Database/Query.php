<?php

namespace Framework\Database;

/**
 * Description of Query
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class Query implements \ArrayAccess, \Iterator
{

    /**
     * @var \PDO
     */
    private $pdo;
    private $select;
    
    private $from;
    
    private $where = [];
    
    private $group;
    
    private $order;
    
    private $limite;
    
    private $params;
    
    private $entity;
    
    private $record;
    
    private $index;

    public function __construct(\PDO $pdo = null)
    {
        
        $this->pdo = $pdo;
    }
  
    public function from(string $table, string $alias = null):self
    {
        if ($alias) {
            $this->from[$alias] = $table;
        } else {
            $this->from [] = $table;
        }
        return $this;
    }
    
    public function select(... $fields):self
    {
        $this->select = $fields;
        return $this;
    }
    
    public function where(... $conditions):self
    {
        $this->where = array_merge($this->where, $conditions);
        return $this;
    }
    
    public function into($entity):self
    {
        $this->entity = $entity;
        return $this;
    }

    public function params(array $params):self
    {
        $this->params = $params;
        return $this;
    }
    
    public function all():array
    {
        if (is_null($this->record)) {
            $this->record = $this->execute()->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $this->record;
    }
    
    public function get(int $index)
    {
        if ($this->entity) {
            return Hydrator::hydrate($this->all()[$index], $this->entity);
        }
        return $this->entity;
    }

    public function __toString()
    {
        $parts = ['SELECT'];
        if ($this->select) {
            $parts[]= join(',', $this->select);
        } else {
            $parts[] = '*';
        }
        $parts[] = 'FROM';
        $parts[] = $this->buildFrom();
        if (!empty($this->where)) {
            $parts[] = 'WHERE' ;
            $parts[] = "(". join(') AND (', $this->where).")";
        }
        return join(' ', $parts);
    }
    
    public function count():int
    {
        $this->select('COUNT(id)');
        $this->execute()->fetchColumn();
    }
    
    private function buildFrom():string
    {
        $from = [];
        foreach ($this->from as $key => $value) {
            if (is_string($key)) {
                $from[] = "$value as $key";
            } else {
                $from[] = $value;
            }
        }
        return join(',', $from);
    }

    private function execute()
    {
        $query = $this->__toString();
        if ($this->params) {
            $statement = $this->pdo->prepare($query);
            $statement->execute($this->params);
        }
        return $this->pdo->query($query);
    }

    public function current()
    {
        return $this->get($this->index);
    }

    public function key(): \scalar
    {
        return $this->index;
    }

    public function next(): void
    {
        $this->index++;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->all()[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value): void
    {
        throw new Exception("can't alter record");
    }

    public function offsetUnset($offset): void
    {
        throw new Exception("unable to unset record");
    }

    public function rewind(): void
    {
        $this->index = 0;
    }

    public function valid(): bool
    {
        return isset($this->all()[$this->index]);
    }
}
