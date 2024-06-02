<?php
namespace app\models;

use app\config\Connect;

class Lista
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function criar()
    {
       
    }
}
