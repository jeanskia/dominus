<?php

namespace App\Mission\Table;

use App\Mission\Entity\TypeMission;
use Framework\Database\Table;

/**
 * Description of TypeMissionTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class TypeMissionTable extends Table
{
   
    protected $table = 'type_mission';
    
    protected $entity = TypeMission::class;
}
