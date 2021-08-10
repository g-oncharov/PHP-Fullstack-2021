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
        $result = false;
        if ($this->authorized) {
            $result = true;
        }
        return $result;
    }

    /**
     * Authorization process.
     * @param string $login
     * @param string $pass
     * @return bool
     */
    public function auth(string $login, string $pass): bool
    {
        $result = false;
        if ($login == 'user' && $pass == 'user') {
            $this->session = new Session();
            $this->session->start();
            $this->session->set("auth", true);
            $this->session->set("login", $login);

            $this->login = $login;
            $this->authorized = true;
            $result = true;
        }
        return $result;
    }

    /**
     * Getting a login.
     */
    public function getLogin()
    {
        $result = false;
        if (isset($this->login)) {
            $result = $this->login;
        }
        return $result;
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
