<?php

namespace app\config;

define('HOST', 'postgres.railway.internal');
define('DATABASENAME', 'railway');
define('USER', 'postgres');
define('PASSWORD', 'wkWPBnOQFXrthmBErLgmdxDNmssArJbr');
define('PORT', '5432');

class Connect
{
    private static $connection;
    
    public function __construct()
    {
    }

    public static function connectDatabase()
    {
        $dsn = 'pgsql:host=' . HOST . ';port=' . PORT . ';dbname=' . DATABASENAME;
        if (!isset(self::$connection)) {
            try {
                self::$connection = new \PDO($dsn, USER, PASSWORD);
            } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                die();
            }
        }
        return self::$connection;
    }
}
