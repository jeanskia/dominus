<?php

namespace Framework\Database;

/**
 * Description of Hydrator
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class Hydrator
{
   
    public static function hydrate($array, $object)
    {
        $instance = new $object();
    }
}
