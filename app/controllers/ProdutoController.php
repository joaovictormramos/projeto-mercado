<?php
namespace app\controllers;

use app\models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = new Produto(); 
        $listaProdutos = $produtos->listarProdutos();
        $this->view('produtos', ['listaprodutos' => $listaProdutos]);
    }

    //Lista todos os produtos utiliando método do model Produto.
    public function listarProdutos()
    {
        $produtos = new Produto();
        $listaProdutos = $produtos->listarProdutos();
        
        $produtosPorSetor = [];

        foreach ($listaProdutos as $produto) {
            if (!isset($produtosPorSetor[$produto->setor_nome])) {
                $produtosPorSetor[$produto->setor_nome] = [];
            }
            $produtosPorSetor[$produto->setor_nome][] = $produto;
        }
        return $produtosPorSetor;
    }

    //Retorna os dados do produto passado como parâmetro seu ID.
    public function descProduto($produtoId)
    {
        $produto = new Produto();
        $produto = $produto->descProduto($produtoId);
        return $produto;
    }

    public function buscarProduto($palavra)
    {
        $produto = new Produto();
        $buscaResult = $produto->buscarProduto($palavra);
        return $buscaResult;
    }

    public function cadastrarProduto(string $produto, $marcaId, $medida, $unidadeMedida, $setorId, $caminhoImg)
    {
        $produtoModel = new Produto();
        $erro = $produtoModel->cadastrarProduto($produto, $marcaId, $medida, $unidadeMedida, $setorId, $caminhoImg);
        return $erro;
    }

}
