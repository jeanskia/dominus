<?php

namespace Framework\Actions;

/**
 * Description of DefaultControllerAction
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
trait DefaultControllerAction
{
   
/**
 * formate la date de format AAAA-mm-jj => jj/mm/AAAA
 * @param array $date
 * @return string
 */
    public function formatDate($date)
    {
        $seperate = explode('-', $date);
        $join = $seperate[2].'/'.$seperate[1].'/'.$seperate[0];
        return $join;
    }
}
