<?php

namespace Model;

use Framework\Session\Session;

class Authentication
{
    public bool $authorized;
    public string $login;
    public Session $session;
    public User $user;
    public string $error;

    public function __construct()
    {
        $this->user = new User();
        $this->session = new Session();
        $this->authorized = false;
    }

    private function setUser($user, $by = 'login')
    {
        $this->session->start();
        $this->session->set("auth", true, "user");
        if ($by == 'login') {
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $email = $user->getEmail();
            $login = $user->getLogin();
            $telephone = $user->getTelephone();
            $status = $user->getStatus();
        }
        if ($by == 'register') {
            $firstName = $user['firstName'];
            $lastName = $user['lastName'];
            $email = $user['email'];
            $login = $user['login'];
            $telephone = $user['telephone'];
            $status = 0;
        }
        $this->session->set("firstName", $firstName, "user");
        $this->session->set("lastName", $lastName, "user");
        $this->session->set("email", $email, "user");
        $this->session->set("login", $login, "user");
        $this->session->set("telephone", $telephone, "user");
        $this->session->set("status", $status, "user");
    }

    /**
     * Authorization check.
     * @return bool
     */
    public function isAuth(): bool
    {
        $result = false;
        $this->session->start();
        $isAuth = $this->session->get("auth", "user") ?? false;
        if ($isAuth) {
            $result = true;
        }
        return $result;
    }

    private function clean($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    private function checkLength($value, $max = 45, $min = 2): bool
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    /**
     * Authorization process.
     * @param string $email
     * @param string $pass
     * @return bool
     */
    public function auth(string $email, string $pass): bool
    {
        $result = false;
        $msg = '';

        $email = $this->clean($email);
        $pass = $this->clean($pass);

        $condition = isset($email) && isset($pass);

        if (!$condition) {
            $msg = 'Fill in all the fields';
        } else {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$this->checkLength($email, 255, 6)) {
                $msg = 'Email is invalid (6 to 255 characters)';
            }
            if (!$this->checkLength($pass, 255, 4)) {
                $msg = 'Password is invalid (4 to 255 characters)';
            }
        }
        if ($msg == '') {
            $passFromDb = $this->user->findByEmail($email)->getPassword();
            if (!is_null($passFromDb) && password_verify($pass, $passFromDb)) {
                $user = $this->user->findByEmail($email);
                $this->setUser($user);
                $this->login = $user->getLogin();
                $result = true;
            } else {
                $msg = 'Password is wrong';
            }
        }

        $this->error = $msg;
        return $result;
    }

    public function register(array $arr): bool
    {
        $result = false;
        $msg = '';

        foreach ($arr as $elem) {
            $elem = $this->clean($elem);
        }

        extract($arr, EXTR_OVERWRITE);
        $condition = isset($firstName)
                    && isset($lastName)
                    && isset($email)
                    && isset($login)
                    && isset($telephone)
                    && isset($pass)
                    && isset($pass2);

        if (!$condition) {
            $msg = 'Fill in all the fields';
        } else {
            $emailValidate = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$emailValidate && !$this->checkLength($emailValidate, 255, 6)) {
                $msg = 'Email is invalid (6 to 255 characters)';
            }
            if (!$this->checkLength($firstName, 15)) {
                $msg = 'First Name is invalid (2 to 15 characters)';
            }
            if (!$this->checkLength($lastName, 15)) {
                $msg = 'Last Name is invalid (2 to 15 characters)';
            }
            if (!$this->checkLength($login)) {
                $msg = 'Login is invalid (2 to 45 characters)';
            }
            if (!$this->checkLength($telephone, 45, 4)) {
                $msg = 'Telephone is invalid (4 to 45 characters)';
            }
            if (!$this->checkLength($pass, 255, 4)) {
                $msg = 'Password is invalid (4 to 255 characters)';
            }
            if ($pass !== $pass2) {
                $msg = 'Password mismatch';
            }
        }

        if ($msg == '') {
            $passHash = password_hash($pass, PASSWORD_BCRYPT);
            $arr['email'] = $emailValidate;
            $this->user->insert($firstName, $lastName, $emailValidate, $login, $passHash, $telephone);
            $this->setUser($arr, 'register');
            $result = true;
        }

        $this->error = $msg;
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
     * Getting a error.
     */
    public function getError()
    {
        $result = false;
        if (isset($this->error)) {
            $result = $this->error;
        }
        return $result;
    }

    /**
     * Log оut.
     * @return void
     */
    public function logOut(): void
    {
        $this->login = '';
    }
}
