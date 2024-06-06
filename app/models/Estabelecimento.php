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

    public function exibirEstabelecimento()
    {
        $sql = "SELECT * FROM tb_pjm_estabelecimento";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $estabelecimentos = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $estabelecimentos;
    }

}
