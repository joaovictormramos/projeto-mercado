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

    //Lista todos os produtos utiliando método do model Produto.
    public function listarProdutos()
    {
        $produtos = new Produto();
        $produtos = $produtos->listarProdutos();
        return $produtos;
    }

    //Retorna os dados do produto passado como parâmetro seu ID.
    public function descProduto($produtoId)
    {
        $produto = new Produto();
        $produto = $produto->descProduto($produtoId);
        return $produto;
    }
}
