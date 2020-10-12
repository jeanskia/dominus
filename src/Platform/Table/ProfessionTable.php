<?php

namespace App\Platform\Table;

use App\Platform\Entity\Profession;
use Framework\Database\Table;

/**
 * Description of ProfessionTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class ProfessionTable extends Table
{
    
    protected $entity = Profession::class;
    
    protected $table = 'profession';
}
