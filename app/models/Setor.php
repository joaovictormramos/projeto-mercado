<?php

namespace app\models;

use app\config\Connect;

class Setor
{
    private $connection;

    public function __construct() {
        $this->connection = Connect::connectDatabase();
    }

    public function getSetor()
    {
        $sql = "SELECT * FROM tb_pjm_setor";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $setores = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $setores;
    }

}