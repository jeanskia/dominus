<?php

namespace App\Platform\Table;

use App\Platform\Entity\Sex;
use Framework\Database\Table;

/**
 * Description of SexTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class SexTable extends Table
{
   
    protected $entity = Sex::class;
    
    protected $table = 'sex';
}
