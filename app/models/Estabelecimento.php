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

    public function cadastrarEstabelecimento($nome, $endereco)
    {
        $sql = "INSERT INTO tb_pjm_estabelecimento (estabelecimento_nome, estabelecimento_endereco) VALUES (?, ?);";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $endereco, \PDO::PARAM_STR);
        $stmt->execute();

    }

}
