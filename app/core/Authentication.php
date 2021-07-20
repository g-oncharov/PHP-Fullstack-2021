<?php

class Authentication
{
    public $authorized;
    public $login;

    public function __construct()
    {
        $this->logOut();
    }

    /**
     * Authorization check.
     * @return bool
     */
    public function isAuth():bool {
        if ($this->authorized) {
            return true;
        }
        return false;
    }

    /**
     * Authorization process.
     * @param string $login
     * @param string $pass
     * @return bool
     */
    public function auth(string $login, string $pass):bool {
        if ($login == 'user' && $pass == 'user') {
            $this->login = $login;
            $this->authorized = true;
            return true;
        }
        return false;
    }

    /**
     * Getting a login.
     */
    public function getLogin() {
        if (isset($this->login)) {
            return $this->login;
        }
        return false;
    }

    /**
     * Log оut.
     * @return void
     */
    public function logOut():void {
        $this->authorized = false;
        $this->login = '';
    }
}