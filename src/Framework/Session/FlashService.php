<?php

namespace Framework\Session;

/**
 * Description of FlashService
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class FlashService
{
   
    private $session;
    
    private $sessionKey = 'flash';
    
    private $messages;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }
    
    public function succes(string $message)
    {
        $flash = $this->session->get($this->sessionKey, []);
        $flash['succes'] = $message;
        $this->session->set($this->sessionKey, $flash);
    }
    
    public function error(string $message)
    {
        $flash = $this->session->get($this->sessionKey, []);
        $flash['error'] = $message;
        $this->session->set($this->sessionKey, $flash);
    }
    
    public function get(string $type)
    {
        if (is_null($this->messages)) {
            $this->messages = $this->session->get($this->sessionKey, []);
            $this->session->delete($this->sessionKey);
        }
        if (array_key_exists($type, $this->messages)) {
            return $this->messages[$type];
        }
        return null;
    }
}
