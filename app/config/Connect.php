<?php

namespace app\config;

define('HOST', 'localhost');
define('DATABASENAME', 'PROJETOMERCADO');
define('USER', 'postgres');
define('PASSWORD', 'postgres');

class Connect
{
    private static $connection;

    public function __construct()
    {
    }

    public static function connectDatabase()
    {
        if (!isset(self::$connection)) {
            try {
                self::$connection = new \PDO('pgsql:host=' . HOST . ', dbname=' . DATABASENAME, USER, PASSWORD);
            } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                die();
            }
        }
        return self::$connection;
    }
}
