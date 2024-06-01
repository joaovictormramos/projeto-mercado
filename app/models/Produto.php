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

    public function marca()
    {
        $marcaModel = new Marca();
        $marcas = $marcaModel->getAllMarcas();
        return $marcas;
    }

    public function cadastrarProduto($produto, $marca_id, $medida, $unidadeMedida)
    {
        $sql = "INSERT INTO tb_pjm_produto(produto, marca_id, medida, unidadeMedida)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $produto);
        $stmt->bindParam(2, $marca_id);
        $stmt->bindParam(3, $medida);
        $stmt->bindParam(4, $unidadeMedida);
        $stmt->execute();
    }

    public function listarProdutos()
    {
        $sql = "SELECT produto.produto_produto, marca.marca_nome, produto.produto_medida, produto.produto_unidademedida
                FROM tb_pjm_produto produto
                JOIN tb_pjm_marca marca ON marca.marca_id = produto.marca_id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $produtos;
    }
}
