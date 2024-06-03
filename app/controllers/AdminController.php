<?php
namespace app\controllers;

use app\controllers\ProdutoController;

class AdminController extends Controller
{
    public function painelAdmin()
    {
        $this->view('admin/paineladmin');

    }

    public function formCadastrarEstabelecimento()
    {
        //$this->view('admin/cadastrarEstabelecimento');

    }

    public function cadastrarEstabelecimento()
    {

    }

    public function cadastrarProduto()
    {
        $produtoController = new ProdutoController();
        $produtoController->cadastrarProduto();
        $this->redirect('/produto/cadastrarproduto');
    }

}
