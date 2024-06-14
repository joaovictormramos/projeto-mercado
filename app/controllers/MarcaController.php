<?php
namespace app\controllers;

use app\models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = $this->getMarcas();
        $this->view('marcas', ['marcas' => $marcas]);
    }
    public function getMarcas()
    {
        $marcaModel = new Marca();
        $marcas = $marcaModel->getMarcas();
        return $marcas;
    }

    public function buscarMarca($palavra)
    {
        $produto = new Marca();
        $buscaResult = $produto->buscarMarca($palavra);
        return $buscaResult;
    }
    
}
