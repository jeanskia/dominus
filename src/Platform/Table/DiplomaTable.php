<?php

namespace App\Platform\Table;

use App\Platform\Entity\Diploma;
use Framework\Database\Table;

/**
 * Description of DiplomaTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class DiplomaTable extends Table
{
    
    protected $entity = Diploma::class;
    
    protected $table = 'diploma';
}
