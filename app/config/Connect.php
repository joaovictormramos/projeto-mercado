<?php

namespace app\config;

define('HOST', 'postgres.railway.internal');
define('DATABASENAME', 'railway');
define('USER', 'postgres');
define('PASSWORD', 'wkWPBnOQFXrthmBErLgmdxDNmssArJbr');

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
