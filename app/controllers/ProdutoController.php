<?php
namespace app\controllers;

use app\models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = new ProdutoController();
        $listaprodutos = $produtos->listarProdutos();
        $this->view('listarprodutos', ['listaprodutos' => $listaprodutos]);
    }

    //Lista todos os produtos utiliando método do model Produto, podendo utilizar o id de um estabeleciemnto para listar seus produtos.
    public function listarProdutos($estabelecimentoId = null)
    {
        $produtos = new Produto();

        if ($estabelecimentoId != null) {
            $produtos = $produtos->listarProdutos($estabelecimentoId);
            return $produtos;
        } else {
            $produtos = $produtos->listarProdutos();
            return $produtos;
        }
    }

    //Lista produtos não cadastrados no estabeleicmento com ID passado por parâmetro.
    public function produtosNaoCadastrados($estabelecimentoId)
    {
        $produtos = new Produto();
        $produtosNaoCadastrados = $produtos->produtosNaoCadastrados($estabelecimentoId);
        return $produtosNaoCadastrados;
    }

    //Retorna os dados do produto passado como parâmetro seu ID.
    public function descProduto($produtoId)
    {
        $produto = new Produto();
        $produto = $produto->descProduto($produtoId);
        return $produto;
    }
}
