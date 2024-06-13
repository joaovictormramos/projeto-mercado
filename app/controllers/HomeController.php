<?php
namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $nome = $_SESSION['usuario_nome'];
            $produtosController = new ProdutoController();
            $produtosPorSetor = $produtosController->listarProdutos();
            $this->view('home', ['nome' => $nome, 'produtosPorSetor' => $produtosPorSetor]);

        } else {
            $produtosController = new ProdutoController();
            $produtosPorSetor = $produtosController->listarProdutos();
            $this->view('home', ['produtosPorSetor' => $produtosPorSetor]);
        }
    }
}
