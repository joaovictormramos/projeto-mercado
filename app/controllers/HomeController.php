<?php
namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $nome = $_SESSION['usuario_nome'];
            $produtosController = new ProdutoController();
            $produtos = $produtosController->listarProdutos();
            $this->view('home', ['nome' => $nome, 'produtos' => $produtos]);
        } else {
            $produtosController = new ProdutoController();
            $produtos = $produtosController->listarProdutos();
            $this->view('home', ['produtos' => $produtos]);
        }
    }
}
