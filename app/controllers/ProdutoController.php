<?php
namespace app\controllers;

use app\models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = new ProdutoController();
        $listaprodutos = $produtos->exibirProduto();
        $this->view('listarprodutos', ['listaprodutos' => $listaprodutos]);
    }

    public function exibirProduto()
    {
        $produtos = new Produto();
        $listaprodutos = $produtos->listarProdutos();
        return $listaprodutos;

    }

    public function obterProdutosPorEstabelecimento($estabelecimentoId)
    {
        $produtos = new Produto();
        $listaprodutos = $produtos->listarProdutosPorEstabelecimento($estabelecimentoId);
        return $listaprodutos;

    }

}
