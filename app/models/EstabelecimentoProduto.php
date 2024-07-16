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
    public function cadastrarProdutoEstabelecimento($preco, $produtoId, $estabelecimentoId)
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
        $stmt->bindParam(3, $preco, \PDO::PARAM_STR);

        try {
            $stmt->execute();
        } catch (\PDOException) {
            $erro = "Erro ao cadastrar produto";
            return $erro;
        }
    }

    //método lista todos os produtos de um estabelecimento recebendo um parâmetro (id do estabelecimento).
    public function listarProdutos($estabelecimentoId)
    {
        $sql = "SELECT produto.produto_id, produto.produto_produto, marca.marca_nome, produto.produto_medida, setor.setor_id, esta_prod.estabelecimento_produto_preco,
                setor.setor_nome, produto.produto_unidademedida, esta_prod.estabelecimento_produto_preco, produto.produto_caminho_img
                FROM tb_pjm_produto produto JOIN tb_pjm_marca marca ON marca.marca_id = produto.marca_id
                JOIN tb_pjm_estabelecimento_produto esta_prod ON esta_prod.produto_id = produto.produto_id
                JOIN tb_pjm_setor setor ON setor.setor_id = produto.setor_id
                WHERE esta_prod.estabelecimento_id = (?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $estabelecimentoId, \PDO::PARAM_INT);
        $stmt->execute();
        $produtos = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $produtos;
    }

    //método lista produtos que NÃO estão cadastrados em um estabelecimento recebendo ID do estabelecimento.
    public function produtosNaoCadastrados($estabelecimentoId)
    {
        $sql = "SELECT produto.produto_id, produto.produto_produto, marca.marca_nome, produto.produto_medida,
                produto.produto_unidademedida, setor.setor_id, setor.setor_nome
                FROM tb_pjm_produto produto JOIN tb_pjm_marca marca
                ON marca.marca_id = produto.marca_id JOIN tb_pjm_setor setor
                ON setor.setor_id = produto.setor_id
                WHERE NOT EXISTS (SELECT 1 FROM tb_pjm_estabelecimento_produto esta_prod
                WHERE esta_prod.produto_id = produto.produto_id
                AND esta_prod.estabelecimento_id = (?))";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $estabelecimentoId, \PDO::PARAM_INT);
        $stmt->execute();
        $produtosNaoCadastrados = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $produtosNaoCadastrados;
    }
}
