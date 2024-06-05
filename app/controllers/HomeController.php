<?php
namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        session_start();

        if ($_SESSION['logado'] == true) {
            $nome = $_SESSION['usuario_nome'];
        }

        $produtos = new ProdutoController();
        $listaprodutos = $produtos->exibirProduto();

        $this->view('home', ['nome' => $nome, 'listaprodutos' => $listaprodutos]);

    }
}
