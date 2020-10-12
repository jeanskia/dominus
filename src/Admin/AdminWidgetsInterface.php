<?php

namespace App\Admin;

/**
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 */
interface AdminWidgetsInterface
{
   
    public function render():string;

    public function renderMenu():string;
    
    public function renderAdminMenu():string;
}
