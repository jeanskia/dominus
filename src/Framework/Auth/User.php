<?php
namespace Framework\Auth;

/**
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 */
interface User
{
/**
 * retourne le nom de l'utilisateur
 * @return string
 */
    public function getUsername(): string;

/**
 * @return string []
 */
    public function getRoles():array;
}
