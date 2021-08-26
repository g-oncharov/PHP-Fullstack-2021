<?php

namespace Model;

use Framework\Session\Session;
use Framework\Validator\Validator;

class Authentication
{
    /** @var Session */
    private Session $session;

    /** @var User */
    private User $user;

    /** @var Validator */
    private Validator $validator;

    /** @var string */
    private string $error;

    public function __construct()
    {
        $this->user = new User();
        $this->session = new Session();
        $this->validator = new Validator();
    }

    /**
     * Set user to session
     *
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $login
     * @param string $telephone
     * @param int $status
     */
    private function setUser(
        int $id,
        string $firstName,
        string $lastName,
        string $email,
        string $login,
        string $telephone,
        int $status
    ): void {
        $this->session->set("id", $id, "user");
        $this->session->set("firstName", $firstName, "user");
        $this->session->set("lastName", $lastName, "user");
        $this->session->set("email", $email, "user");
        $this->session->set("login", $login, "user");
        $this->session->set("telephone", $telephone, "user");
        $this->session->set("status", $status, "user");
    }

    /**
     * Set user to session after authorization
     *
     * @param object $user
     */
    private function setUserAfterLogin(object $user): void
    {
        $this->session->start();
        $this->session->set("auth", true, "user");
        $id = (int) $user->getId();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $email = $user->getEmail();
        $login = $user->getLogin();
        $telephone = $user->getTelephone();
        $status = $user->getStatus();

        $this->setUser($id, $firstName, $lastName, $email, $login, $telephone, $status);
    }

    /**
     * Set user to session after registration
     *
     * @param array $user
     */
    private function setUserAfterRegistration(array $user): void
    {
        $this->session->start();
        $this->session->set("auth", true, "user");
        $id = $user['id'] ;
        $firstName = $user['firstName'];
        $lastName = $user['lastName'];
        $email = $user['email'];
        $login = $user['login'];
        $telephone = $user['telephone'];
        $status = 0;

        $this->setUser($id, $firstName, $lastName, $email, $login, $telephone, $status);
    }

    /**
     * Authorization process.
     *
     * @param string $email
     * @param string $pass
     * @return bool
     */
    public function auth(string $email, string $pass): bool
    {
        $result = false;
        $msg = '';

        $email = $this->validator->clean($email);
        $pass = $this->validator->clean($pass);

        $condition = isset($email) && isset($pass);

        if (!$condition) {
            $msg = 'Fill in all the fields';
        } else {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$this->validator->checkLength($email, 255, 6)) {
                $msg = 'Email is invalid (6 to 255 characters)';
            }
            if (!$this->validator->checkLength($pass, 255, 4)) {
                $msg = 'Password is invalid (4 to 255 characters)';
            }
        }
        if (empty($msg)) {
            $passFromDb = $this->user->findByEmail($email)->getPassword();
            if (!is_null($passFromDb) && password_verify($pass, $passFromDb)) {
                $user = $this->user->findByEmail($email);
                $this->setUserAfterLogin($user);
                $result = true;
            } else {
                $msg = 'Password is wrong';
            }
        }

        $this->error = $msg;
        return $result;
    }

    /**
     * Registration process
     *
     * @param array $arr
     * @return bool
     */
    public function register(array $arr): bool
    {
        $result = false;
        $msg = '';

        foreach ($arr as $elem) {
            $elem = $this->validator->clean($elem);
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

            $emailIsUsed = (bool) count((array) $this->user->findByEmail($emailValidate));
            $loginIsUsed = (bool) count((array) $this->user->findByLogin($login));

            if ($emailIsUsed) {
                $msg = 'Email is used';
            }
            if ($loginIsUsed) {
                $msg = 'Login is used';
            }
            if (!$emailValidate && !$this->validator->checkLength($emailValidate, 255, 6)) {
                $msg = 'Email is invalid (6 to 255 characters)';
            }
            if (!$emailValidate && !$this->validator->checkLength($emailValidate, 255, 6)) {
                $msg = 'Email is invalid (6 to 255 characters)';
            }
            if (!$this->validator->checkLength($firstName, 15)) {
                $msg = 'First Name is invalid (2 to 15 characters)';
            }
            if (!$this->validator->checkLength($lastName, 15)) {
                $msg = 'Last Name is invalid (2 to 15 characters)';
            }
            if (!$this->validator->checkLength($login)) {
                $msg = 'Login is invalid (2 to 45 characters)';
            }
            if (!$this->validator->checkLength($telephone, 45, 4)) {
                $msg = 'Telephone is invalid (4 to 45 characters)';
            }
            if (!$this->validator->checkLength($pass, 255, 4)) {
                $msg = 'Password is invalid (4 to 255 characters)';
            }
            if ($pass !== $pass2) {
                $msg = 'Password mismatch';
            }
        }

        if (empty($msg)) {
            $passHash = password_hash($pass, PASSWORD_BCRYPT);
            $id = $this->user->findLastId()->getId() + 1;
            $arr['email'] = $emailValidate;
            $arr['id'] = $id;
            $this->user->insert($firstName, $lastName, $emailValidate, $login, $passHash, $telephone);
            $this->setUserAfterRegistration($arr);
            $result = true;
        }

        $this->error = $msg;
        return $result;
    }

    /**
     * Authorization check.
     *
     * @return bool
     */
    public function isAuth(): bool
    {
        $this->session->start();
        return $this->session->get("auth", "user") ?? false;
    }

    /**
     * Administrator check.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        $result = false;
        $this->session->start();
        if ($this->getStatus() === 10) {
            $result = true;
        }
        return $result;
    }

    /**
     * Getting status.
     *
     * @return int|null
     */
    public function getStatus(): ?int
    {
        $this->session->start();
        return $this->session->get("status", "user");
    }

    /**
     * Getting error.
     *
     * @return false|string
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
     *
     * @return void
     */
    public function logOut(): void
    {
        $this->session->destroy();
    }
}
