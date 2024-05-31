<?php
namespace app\controllers;

use app\models\Marca;
use app\models\Produto;

class ProdutoController extends Controller
{
    public function formularioAdicionarProduto()
    {
        $marcaModel = new Marca();
        $marcas = $marcaModel->getAllMarcas();
        $this->view('cadastrarProduto', ['title' => 'Adicionar Produto', 'marcas' => $marcas]);

    }

    public function cadastrarProduto()
    {
        if (empty($_POST['produto']) || empty($_POST['marcaId']) || empty($_POST['medida']) || empty($_POST['unidadeMedida'])) {
            echo 'Preencha todos os campos.';

        } else if ($_POST['medida'] <= 0) {
            echo 'Não exite peso/ volume negativo';

        } else {
            $produto = ucfirst($_POST['produto']);
            $marcaId = (int) $_POST['marcaId'];
            $medida = (float) $_POST['medida'];
            $unidadeMedida = $_POST['unidadeMedida'];
            var_dump($produto);
            var_dump($marcaId);
            var_dump($medida);
            var_dump($unidadeMedida);
            $novoProduto = new Produto();
            $novoProduto->cadastrarProduto($produto, $marcaId, $medida, $unidadeMedida);

            $this->redirect('/');

        }
    }

    public function listarProdutos()
    {
        $produtos = new Produto();
        $listaProdutos = $produtos->listarProdutos();
        return $listaProdutos;

    }
}
