<?php

namespace Framework\Authentication;

class Authentication
{
    public $authorized;
    public $login;
    public $session;

    /**
     * Authorization check.
     * @return bool
     */
    public function isAuth(): bool
    {
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
    public function auth(string $login, string $pass): bool
    {
        if ($login == 'user' && $pass == 'user') {
            $this->session = new Session();
            $this->session->start();
            $this->session->set("auth", true);
            $this->session->set("login", $login);

            $this->login = $login;
            $this->authorized = true;
            return true;
        }
        return false;
    }

    /**
     * Getting a login.
     */
    public function getLogin()
    {
        if (isset($this->login)) {
            return $this->login;
        }
        return false;
    }

    /**
     * Log оut.
     * @return void
     */
    public function logOut(): void
    {
        $this->authorized = false;
        $this->login = '';
    }
}
