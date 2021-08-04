<?php

namespace Core;

class ActiveRecord
{
    protected static $db;

    public static function setDb($db) {
        self::$db = $db;
    }
}