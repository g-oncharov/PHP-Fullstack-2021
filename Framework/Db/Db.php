<?php

namespace Framework\Db;

use PDO;
use PDOException;
use Framework\Env\Env;

class Db
{
    /** @var PDO */
    public PDO $pdo;

    public function __construct()
    {
        $dotenv = new Env('App/config/.env');
        $dotenv->load();

        $connection = getenv("DB_CONNECTION");
        $host = getenv("DB_HOST");
        $dbname = getenv("DB_DATABASE");
        $username = getenv("DB_USERNAME");
        $password = getenv("DB_PASSWORD");
        try {
            $this->pdo = new PDO("$connection:host=$host;dbname=$dbname", $username, $password);
            return $this->pdo;
        } catch (PDOException $e) {
            return $e;
        }
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string $className
     * @return array|null
     */
    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(PDO::FETCH_CLASS, $className);
    }
}
