<?php
namespace App\Auth\Table;

use Framework\Database\Table;
use App\Auth\Entity\User;

/**
 * Description of UserTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class UserTable extends Table
{
    
     /**
     * Nom de la table en BDD
     * @var string
     */
    protected $table = 'users';
    /**
     * Entité à utiliser
     * @var string
     */
    protected $entity = User::class;
}
