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

    //Faz o cadastro do produto no estabelecimento, adicionando o preço do produto.
    public function confirmaCadastro($estabelecimentoId, $produtoId, $produtoPreco)
    {
        // Verificar se o produto já está cadastrado para o estabelecimento
        $verificaSql = "SELECT COUNT(*) FROM tb_pjm_estabelecimento_produto WHERE estabelecimento_id = (?) AND produto_id = (?)";
        $verificaStmt = $this->connection->prepare($verificaSql);
        $verificaStmt->bindParam(1, $estabelecimentoId, \PDO::PARAM_INT);
        $verificaStmt->bindParam(2, $produtoId, \PDO::PARAM_INT);
        $verificaStmt->execute();
        $produtoExiste = $verificaStmt->fetchColumn();

        if ($produtoExiste > 0) {
            return "Produto já cadastrado!";
        }

        // Inserir o produto se não estiver cadastrado
        $sql = "INSERT INTO tb_pjm_estabelecimento_produto (estabelecimento_id, produto_id, estabelecimento_produto_preco)
            VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $estabelecimentoId, \PDO::PARAM_INT);
        $stmt->bindParam(2, $produtoId, \PDO::PARAM_INT);
        $stmt->bindParam(3, $produtoPreco, \PDO::PARAM_STR);

        $bemSucedido = $stmt->execute();

        if ($bemSucedido) {
            return "Cadastro bem-sucedido!";
        } else {
            $erro = $stmt->errorInfo();
            return "Erro ao cadastrar produto: " . $erro[2];
        }
    }
}
