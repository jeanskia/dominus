<?php

namespace App\Auth;

use App\Auth\Table\UserTable;
use Framework\Auth;
use Framework\Auth\User;
use Framework\Session\SessionInterface;

/**
 * Description of DatabaseAuth
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class DatabaseAuth implements Auth
{

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var UserTable
     */
    private $userTable;
    
    /**
     *
     * @var User
     */
    private $user;

    public function __construct(UserTable $userTable, SessionInterface $session)
    {
        $this->userTable = $userTable;
        $this->session = $session;
    }
    
    public function login(string $username, string $password)
    {
        if (empty($username) || empty($password)) {
            return null;
        }
        
        $user = $this->userTable->findBy('username', $username);
        if ($user && password_verify($password, $user->password)) {
            $this->session->set('auth.user', $user->id);
            return $user;
        }
        return null;
    }
    
    public function logout():void
    {
        $this->session->delete('auth.user');
    }

    /**
    *
    * @return User|null
    */
    public function getUser()
    {
        if ($this->user) {
            return $this->user;
        }
        
        $userId = $this->session->get('auth.user');
        if ($userId) {
            try {
                $this->user = $this->userTable->find($userId);
                return $this->user;
            } catch (NoRecordException $exception) {
                $this->session->delete('auth.user');
                return null;
            }
        }
        return null;
    }
}
