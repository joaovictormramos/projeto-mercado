<?php
namespace app\controllers;

use app\models\Estabelecimento;

class EstabelecimentoController extends Controller
{

    public function index()
    {
        $estabelecimentos = $this->exibirEstabelecimento();
        $this->view('estabelecimentos', ['estabelecimentos' => $estabelecimentos]);
    }

    //Lista todos os estabelecimentos cadastrados.
    public function exibirEstabelecimento()
    {
        $estabelecimentos = new Estabelecimento();
        $estabelecimentos = $estabelecimentos->exibirEstabelecimento();
        return $estabelecimentos;
    }

    public function cadastrarEstabelecimento($estabelecimentoNome, $estabelecimentoEndereco)
    {
        $estabelecimento = new Estabelecimento();
        $erro = $estabelecimento->cadastrarEstabelecimento($estabelecimentoNome, $estabelecimentoEndereco);
        return $erro;
    }

    public function listarProdutos()
    {
        $setorController = new SetorController();
        $setores = $setorController->getSetor();
        $estabelecimentoNome = $_POST['estabelecimentoNome'];
        $estabelecimentoID = $_POST['estabelecimentoID'];
        $produtos = new EstabelecimentoProdutoController();
        $produtos = $produtos->listarProdutos($estabelecimentoID);

        $this->view('produtosEstabelecimento', ['produtos' => $produtos, 'estabelecimentoNome' => $estabelecimentoNome, 'setores' => $setores]);

    }

}
