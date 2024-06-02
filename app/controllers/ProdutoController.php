<?php
namespace app\controllers;

use app\models\Produto;

class ProdutoController extends Controller
{
    public function exibirProdutos()
    {
        $produtos = new Produto();
        $listaprodutos = $produtos->listarProdutos();
        return $listaprodutos;

    }
}
