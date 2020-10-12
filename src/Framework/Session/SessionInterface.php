<?php
namespace Framework\Session;

/**
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 */
interface SessionInterface
{
    
/**
 * Récupère une information en session
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
    public function get(string $key, $default = null);

/**
 * Ajoute une information en session
 * @param string $key
 * @param type $value
 */
    public function set(string $key, $value);

/**
 * Supprime une clef en session
 * @param string $key
 */
    public function delete(string $key);
}
