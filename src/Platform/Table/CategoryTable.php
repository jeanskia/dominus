<?php

namespace App\Platform\Table;

use App\Platform\Entity\Category;
use Framework\Database\Table;

/**
 * Description of CategoryTable
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class CategoryTable extends Table
{
  /**
     * Nom de la table en BDD
     * @var string
     */
    protected $table = 'category';
    /**
     * Entité à utiliser
     * @var string
     */
    protected $entity = Category::class;
}
