<?php

namespace Model;

use Framework\ActiveRecordEntity\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    /** @var string */
    protected string $firstName;

    /** @var string */
    protected string $lastName;

    /** @var string */
    protected string $email;

    /** @var string */
    protected string $login;

    /** @var string */
    protected string $password;

    /** @var string */
    protected string $telephone;

    /** @var int */
    protected int $status;

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getLogin(): ?string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * @return int
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param string $email
     * @return User|null
     */
    public static function findByEmail(string $email): ?self
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $entities = self::$db->query(
            $sql,
            User::class,
            [':email' => $email]
        );
        return $entities ? $entities[0] : null;
    }

    /**
     * @param string $login
     * @return User|null
     */
    public static function findByLogin(string $login): ?self
    {
        $sql = 'SELECT * FROM users WHERE login = :login;';

        $entities = self::$db->query(
            $sql,
            User::class,
            [':login' => $login]
        );
        return $entities ? $entities[0] : null;
    }

    /**
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $login
     * @param string $password
     * @param string $telephone
     */
    public static function insert(
        string $first_name,
        string $last_name,
        string $email,
        string $login,
        string $password,
        string $telephone
    ): void {
        $sql = 'INSERT INTO `users` (`first_name`, `last_name`, `email`, `login`, `password`, `telephone`, `status`)
                VALUES (:first_name, :last_name, :email, :login, :password, :telephone, 0);';

        self::$db->query(
            $sql,
            User::class,
            [
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':login' => $login,
                ':password' => $password,
                ':telephone' => $telephone,
            ]
        );
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}
