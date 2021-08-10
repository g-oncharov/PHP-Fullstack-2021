<?php

namespace Framework\Db;

use PDO;
use PDOException;
use Framework\Env\Env;

class Db
{
    /** @var PDO|null */
    public ?PDO $pdo;

    /** @var PDOException */
    public PDOException $error;

    public function __construct()
    {
        $dotenv = new Env('../App/config/.env');
        $dotenv->load();

        $connection = getenv("DB_CONNECTION");
        $host = getenv("DB_HOST");
        $dbname = getenv("DB_DATABASE");
        $username = getenv("DB_USERNAME");
        $password = getenv("DB_PASSWORD");

        try {
            $this->pdo = new PDO("$connection:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            $this->error = $e;
            $this->pdo = null;
        }
        return $this->pdo;
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string $className
     * @return array|null
     */
    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $result = null;
        if (!is_null($this->pdo)) {
            $sth = $this->pdo->prepare($sql);
            $data = $sth->execute($params);

            if ($data) {
                $result = $sth->fetchAll(PDO::FETCH_CLASS, $className);
            }
        }
        return $result;
    }
}
