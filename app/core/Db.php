<?php

namespace Core;

class Db
{
    public static function getConnection()
    {
        $dbConf = require_once($_SERVER['DOCUMENT_ROOT'] . '/app/config/db.php');
        extract($dbConf, EXTR_OVERWRITE);
        try {
            return new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
}