<?php

namespace Framework\Session;

/**
 * Description of PHPSession
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class PHPSession implements SessionInterface, \ArrayAccess
{
    
    /**
     * Assure que la Session est démarrée
     */
    public function ensureStarted()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function delete(string $key)
    {
        $this->ensureStarted();
        unset($_SESSION[$key]);
    }

    public function get(string $key, $default = null)
    {
         $this->ensureStarted();
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return $default;
    }

    public function set(string $key, $value)
    {
        $this->ensureStarted();
        $_SESSION[$key] = $value;
    }

    public function offsetExists($offset): bool
    {
        $this->ensureStarted();
        return array_key_exists($offset, $_SESSION);
    }

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetSet($offset, $value): void
    {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset): void
    {
        $this->delete($offset);
    }
}
