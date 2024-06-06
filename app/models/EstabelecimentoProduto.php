<?php

namespace app\models;

use app\config\Connect;

class EstabelecimentoProduto
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function confirmaCadastro($estabelecimentoId, $produtoId, $produtoPreco)
    {
        $sql = "INSERT INTO tb_pjm_estabelecimento_produto (estabelecimento_id, produto_id, estabelecimento_produto_preco)
                VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $estabelecimentoId, \PDO::PARAM_INT);
        $stmt->bindParam(2, $produtoId, \PDO::PARAM_INT);
        $stmt->bindParam(3, $produtoPreco, \PDO::PARAM_STR);
        $stmt->execute();
    }
}
