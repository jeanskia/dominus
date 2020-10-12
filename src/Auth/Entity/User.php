<?php
namespace App\Auth\Entity;

/**
 * Description of User
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class User implements \Framework\Auth\User
{
    //put your code here
    public function getRoles(): array
    {
    }

    public function getUsername(): string
    {
    }
}
