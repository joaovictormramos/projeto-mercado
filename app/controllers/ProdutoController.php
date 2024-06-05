<?php
namespace app\controllers;

use app\controllers\MarcaController;
use app\models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = new ProdutoController();
        $listaprodutos = $produtos->exibirProduto();
        $this->view('listarprodutos', ['listaprodutos' => $listaprodutos]);
    }

    public function exibirProduto()
    {
        $produtos = new Produto();
        $listaprodutos = $produtos->listarProdutos();
        return $listaprodutos;

    }

    public function formCadastrarProduto()
    {
        $marcaController = new MarcaController();
        $marcas = $marcaController->getMarcas();
        $this->view('admin/cadastrarProduto', ['marcas' => $marcas]);

    }

    public function cadastrarProduto()
    {
        if (empty($_POST['produto'])) {
            echo 'Preencha nome produto.';
        } else if (empty($_POST['marcad'])) {
            echo 'Preencha marca';
        } else if (empty($_POST['medida'])) {
            echo 'Preencha medida';
        } else if (empty($_POST['unidadeMedida'])) {
            echo 'Preencha unidade de medida';
        }

        $produto = $_POST['produto'];
        $marcaId = $_POST['marcaId'];
        $medida = $_POST['medida'];
        $unidadeMedida = $_POST['unidadeMedida'];

        $novoProduto = new Produto();
        $novoProduto->cadastrarProduto($produto, $marcaId, $medida, $unidadeMedida);
    }

}
