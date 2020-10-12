<?php

namespace App\Platform\Table;

use App\Platform\Entity\MaritalStatus;
use Framework\Database\Table;

/**
 * Description of MaritalStatusTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class MaritalStatusTable extends Table
{
    
    protected $entity = MaritalStatus::class ;
            
    protected $table = 'maritalstatus';
}
