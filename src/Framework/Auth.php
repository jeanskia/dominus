<?php

namespace Framework;

use Framework\Auth\User;

/**
 * Description of Auth
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
interface Auth
{
   /**
    * @return User|null
    */
    public function getUser();
}
