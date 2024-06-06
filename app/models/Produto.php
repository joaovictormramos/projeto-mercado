<?php

namespace app\models;

use app\config\Connect;

class Produto
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function cadastrarProduto($produto, $marca_id, $medida, $unidadeMedida)
    {
        $sql = "INSERT INTO tb_pjm_produto(produto_produto, marca_id, produto_medida, produto_unidadeMedida)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $produto, \PDO::PARAM_STR);
        $stmt->bindParam(2, $marca_id, \PDO::PARAM_INT);
        $stmt->bindParam(3, $medida, \PDO::PARAM_STR);
        $stmt->bindParam(4, $unidadeMedida, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function listarProdutos($estabelecimentoId = null)
    {
        $sql = "SELECT produto.produto_produto, marca.marca_nome, produto.produto_medida, produto.produto_unidademedida";

        if ($estabelecimentoId !== null) {
            $sql .= ", esta_prod.estabelecimento_produto_preco
                FROM tb_pjm_produto produto
                JOIN tb_pjm_marca marca ON marca.marca_id = produto.marca_id
                JOIN tb_pjm_estabelecimento_produto esta_prod ON esta_prod.produto_id = produto.produto_id
                WHERE esta_prod.estabelecimento_id = ?";
        } else {
            $sql .= " FROM tb_pjm_produto produto
                 JOIN tb_pjm_marca marca ON marca.marca_id = produto.marca_id";
        }

        $stmt = $this->connection->prepare($sql);

        if ($estabelecimentoId !== null) {
            $stmt->bindParam(1, $estabelecimentoId, \PDO::PARAM_INT);
        }

        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $produtos;
    }
}
