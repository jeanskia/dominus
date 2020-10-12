<?php

namespace App\Platform\Table;

use App\Platform\Entity\Grade;
use Framework\Database\Table;

/**
 * Description of GradeTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class GradeTable extends Table
{
   
    protected $entity = Grade::class;
    
    protected $table = 'grade';
}
