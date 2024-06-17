<?php

namespace app\controllers;

class AdminController extends Controller
{
    //Chama o painel de administrador.
    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
            $nome = $_SESSION['nome'];
            $idAdmin = $_SESSION['id'];
            $isAdmin = $_SESSION['isAdmin'];
            $this->view('admin/painelAdmin', ['idAdmin' => $idAdmin]);
        }
    }

    //Usa o método exibirEstabelecimentos de EstabelecimentoController para enviar à view gerenciarEstabelecimento todos os estabelecimentos.
    public function gerenciarEstabelecimento()
    {
        $estabelecimentoController = new EstabelecimentoController();
        $estabelecimentos = $estabelecimentoController->exibirEstabelecimento();
        $this->view('admin/gerenciarEstabelecimento', ['estabelecimentos' => $estabelecimentos]);
    }

    //Usa o método exibirProdutos de EstabelecimentoController para enviar à view editarestoque os produtos do estabelecimento utilizando o id.
    public function editarEstoque()
    {
        $idEstabelecimento = $_POST['idEstabelecimento'];
        $nomeEstabelecimento = $_POST['estabelecimento'];
        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $estabelecimentoProdutos = $estabelecimentoProdutoController->exibirProdutos($idEstabelecimento);

        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $produtosACadastrar = $estabelecimentoProdutoController->produtosNaoCadastrados($idEstabelecimento);

        $this->view('admin/editarEstoque', ['estabelecimentoProdutos' => $estabelecimentoProdutos, 'produtosACadastrar' => $produtosACadastrar, 'estabelecimentoId' => $idEstabelecimento, 'nomeEstabelecimento' => $nomeEstabelecimento]);

    }

    public function gerenciarProduto()
    {
        $setores = new SetorController();
        $setores = $setores->getSetor();
        $this->view('admin/gerenciarProduto', ['setores' => $setores]);
    }

    public function editarSetor()
    {
        $setorId = $_POST['setorId'];
        $setorNome = $_POST['setorNome'];
        $produtoController = new ProdutoController();
        $produtosPorSetor = $produtoController->listarProdutos();
        $this->view('/admin/editarSetor', ['setorId' => $setorId, 'setorNome' => $setorNome, 'produtosPorSetor' => $produtosPorSetor]);
    }

    public function cadastrarProduto()
    {
        if ($_SERVER['REQUEST_METHOD'] == $_POST) {

        } else {
            $marcasController = new MarcaController();
            $marcas = $marcasController->getMarcas();
            $this->view('admin/cadastrarproduto', ['marcas' => $marcas]);
        }
    }

}
