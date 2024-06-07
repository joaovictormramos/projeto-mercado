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

    //Cadastra produtos.
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

    //método lista todos os produtos
    public function listarProdutos()
    {
        $sql = "SELECT produto.produto_id, produto.produto_produto, marca.marca_nome, produto.produto_medida, produto.produto_unidademedida
                FROM tb_pjm_produto produto JOIN tb_pjm_marca marca ON marca.marca_id = produto.marca_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $produtos;
    }

    //retorna os dados de um único produto.
    public function descProduto($produtoId)
    {
        $sql = "SELECT produto.produto_produto, marca.marca_nome, produto.produto_medida, produto.produto_unidademedida
                FROM tb_pjm_produto produto JOIN tb_pjm_marca marca ON marca.marca_id = produto.marca_id WHERE produto.produto_id = (?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $produtoId, \PDO::PARAM_INT);
        $stmt->execute();
        $produto = $stmt->fetch(\PDO::FETCH_OBJ);
        return $produto;
    }
}
