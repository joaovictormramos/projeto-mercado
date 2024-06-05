<?php
namespace app\controllers;

use app\controllers\ProdutoController;
use app\controllers\EstabelecimentoController;

class AdminController extends Controller
{
    public function index()
    {
        $this->view('admin/painelAdmin');

    }


    public function gerenciarEstabelecimento()
    {
        $estabelecimentoController = new EstabelecimentoController();
        $estabelecimentoController->formGerenciarEstabelecimento();
    }

    public function cadastrarProduto()
    {
        $produtoController = new ProdutoController();
        $produtoController->formCadastrarProduto();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produtoController->cadastrarProduto();
            $this->redirect('cadastrarproduto');
        }
    }

}
