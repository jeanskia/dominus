<?php

namespace App\Platform\Table;

use Framework\Database\Table;
use TYPO3\CMS\Reports\Status;

/**
 * Description of StatusTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class StatusTable extends Table
{
   
    protected $entity = Status::class;
    
    protected $table = 'statuts';
}
