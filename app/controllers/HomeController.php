<?php
namespace app\controllers;

class HomeController extends Controller
{
    public function index()
    {
        session_start();

        if ($_SESSION['logado'] == true) {
            $nome = $_SESSION['usuario_nome'];
        } else {

        }

        $produtos = new ProdutoController();
        $listaprodutos = $produtos->exibirProdutos();

        $this->view('home', ['title' => 'Home', 'name' => 'SupportMercado', 'nome' => $nome, 'listaprodutos' => $listaprodutos]);

    }
}
