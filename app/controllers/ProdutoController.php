<?php
namespace app\controllers;

use app\controllers\MarcaController;
use app\models\Produto;

class ProdutoController extends Controller
{
    public function exibirProdutos()
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
        if (empty($_POST['produto']) || empty($_POST['marcaId']) || empty($_POST['medida']) || empty($_POST['unidadeMedida'])) {
            echo 'Preencha todos os campos.';
        }

        $produto = $_POST['produto'];
        $marcaId = $_POST['marcaId'];
        $medida = $_POST['medida'];
        $unidadeMedida = $_POST['unidadeMedida'];

        $novoProduto = new Produto();
        $novoProduto->cadastrarProduto($produto, $marcaId, $medida, $unidadeMedida);

    }

}
