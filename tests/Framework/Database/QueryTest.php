<?php
namespace Tests\Framework\Database;

use Framework\Database\Query;
use PHPUnit\Framework\TestCase;
/**
 * Description of QueryTest
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class QueryTest extends TestCase {
   
    
    public function testSimpleQuery()
    {
        $query = (new Query())->from('agents')->select('name');
        
        $this->assertEquals('SELECT name FROM agents', (string)$query);
    }
    
     public function testQueryWithWhere()
    {
        $query = (new Query())->from('agents','a')->where('id = :id or id=:bb','name=:name');
        
        $this->assertEquals('SELECT * FROM agents as a WHERE (id = :id or id=:bb) AND (name=:name)', (string)$query);
    }
}
