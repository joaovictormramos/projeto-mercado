<?php
namespace app\controllers;

use app\models\EstabelecimentoProduto;

class EstabelecimentoProdutoController extends Controller
{
    //utiliza o método do controller ProdutoController para listar os produtos do próprio estabelecimento passado por id.
    public function exibirProdutos($estabelecimentoId)
    {
        $produto = new ProdutoController();
        $estabelecimentoProdutos = $produto->listarProdutos($estabelecimentoId);
        return $estabelecimentoProdutos;
    }

    //utiliza o método do controller ProdutoController para listar os produtos NÃO CADASTRADOS NO ESTABELECIMENTO passado por id.
    public function exibirProdutosNaoCadastrados($estabelecimentoId)
    {
        $produto = new ProdutoController();
        $produtosNaoCadastrados = $produto->produtosNaoCadastrados($estabelecimentoId);
        return $produtosNaoCadastrados;
    }

    public function cadastrarProdutoEstabelecimento()
    {
        $estabelecimentoId = $_POST['estabelecimento_id'];
        $produtoId = $_POST['produto_id'];
        $produtoController = new ProdutoController();
        $descProduto = $produtoController->descProduto($produtoId);
        $this->view('admin/cadastrarProduto', ['descProduto' => $descProduto, 'estabelecimentoId' => $estabelecimentoId, 'produtoId' => $produtoId]);
    }

    public function confirmaCadastro()
    {
        if (empty($_POST['estabelecimento_id']) || empty($_POST['produto_id']) || empty($_POST['preco'])) {
            echo 'Erro';
        }
        $estabelecimentoId = $_POST['estabelecimento_id'];
        $produtoId = $_POST['produto_id'];
        $precoProduto = $_POST['preco'];

        $estabelecimentoProduto = new EstabelecimentoProduto();
        $estabelecimentoProduto->confirmaCadastro($estabelecimentoId, $produtoId, $precoProduto);

        $this->redirect('../admin/editarestoque');
    }

}
