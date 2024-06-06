<?php
namespace app\controllers;

use app\models\Produto;

class AdminController extends Controller
{
    //Chama o painel de administrador.
    public function index()
    {
        $this->view('admin/painelAdmin');
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
        $estabelecimentoId = $_POST['estabelecimento_id'];
        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $estabelecimentoProdutos = $estabelecimentoProdutoController->exibirProdutos($estabelecimentoId);

        $produtoController = new Produto();
        $produtosACadastrar = $produtoController->produtosNaoCadastrados($estabelecimentoId);

        $this->view('admin/editarEstoque', ['estabelecimentoProdutos' => $estabelecimentoProdutos,
        'produtosACadastrar' => $produtosACadastrar, 'estabelecimentoId' => $estabelecimentoId]);

    }

}
