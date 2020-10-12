<?php

namespace App\Platform\Table;

use App\Platform\Entity\FunctionEntity;
use Framework\Database\Table;

/**
 * Description of FunctionTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class FunctionTable extends Table
{
   
    protected $entity = FunctionEntity::class;
    
    protected $table = 'function';
}
