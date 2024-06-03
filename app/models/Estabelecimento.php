<?php

namespace app\models;

use app\config\Connect;

class Estabelecimento
{
    private $connection;
    
    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

}
