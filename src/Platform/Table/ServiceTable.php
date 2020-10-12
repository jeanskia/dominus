<?php

namespace App\Platform\Table;

use App\Platform\Entity\Service;
use Framework\Database\Table;

/**
 * Description of ServiceTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class ServiceTable extends Table
{

    protected $entity = Service::class ;
            
    protected $table = 'services';
     
    protected function paginationQuery()
    {
        parent::paginationQuery()." ORDER BY name DESC";
    }
}
