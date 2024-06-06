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

}
