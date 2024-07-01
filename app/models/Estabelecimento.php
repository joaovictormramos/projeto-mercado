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

    public function cadastrarEstabelecimento($estabelecimentoNome, $estabelecimentoEndereco)
    {
        $sql = "INSERT INTO tb_pjm_estabelecimento (estabelecimento_nome, estabelecimento_endereco) VALUES (?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $estabelecimentoNome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $estabelecimentoEndereco, \PDO::PARAM_STR);
        try {
            $stmt->execute();
        } catch (\PDOException $e){
            return $e->getMessage();
        }        
    }
}
