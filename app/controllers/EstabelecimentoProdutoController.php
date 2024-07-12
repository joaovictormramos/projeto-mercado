<?php
namespace app\controllers;

use app\models\EstabelecimentoProduto;

class EstabelecimentoProdutoController extends Controller
{
    //utiliza o método do controller ProdutoController para listar os produtos do próprio estabelecimento passado por id.
    public function exibirProdutos($estabelecimentoId)
    {
        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $estabelecimentoProdutos = $estabelecimentoProdutoController->listarProdutos($estabelecimentoId);
        return $estabelecimentoProdutos;
    }

    //utiliza o método do controller ProdutoController para listar os produtos NÃO CADASTRADOS NO ESTABELECIMENTO passado por id.
    public function exibirProdutosNaoCadastrados($estabelecimentoId)
    {
        $estabelecimentoProdutoController = new EstabelecimentoProdutoController();
        $produtosNaoCadastrados = $estabelecimentoProdutoController->produtosNaoCadastrados($estabelecimentoId);
        return $produtosNaoCadastrados;
    }

    public function cadastrarProdutoEstabelecimento($preco, $produtoId, $estabelecimentoId)
    {
        $estabelecimentoProduto = new EstabelecimentoProduto();
        $msg = $estabelecimentoProduto->cadastrarProdutoEstabelecimento($preco, $produtoId, $estabelecimentoId);
        return $msg;
    }

    //Lista todos os produtos de um estabelecimento utiliando método do model EstabelecimentoProdutostabelecimento e passando o id para listar seus produtos.
    public function listarProdutos($estabelecimentoId)
    {
        $produtos = new EstabelecimentoProduto();
        $produtos = $produtos->listarProdutos($estabelecimentoId);
        return $produtos;
    }

    //Lista produtos não cadastrados no estabeleicmento com ID passado por parâmetro.
    public function produtosNaoCadastrados($estabelecimentoId)
    {
        $produtos = new EstabelecimentoProduto();
        $produtosNaoCadastrados = $produtos->produtosNaoCadastrados($estabelecimentoId);
        return $produtosNaoCadastrados;
    }

}
