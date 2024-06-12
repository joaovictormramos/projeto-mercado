<?php
namespace app\controllers;

use app\models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = new Produto();
        $listaprodutos = $produtos->listarProdutos();
        $this->view('produtos', ['listaprodutos' => $listaprodutos]);
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

    public function buscarProduto($palavra)
    {
        $produto = new Produto();
        $buscaResult = $produto->buscarProduto($palavra);
        return $buscaResult;
    }
}
