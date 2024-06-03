<?php
namespace app\controllers;

use app\models\Marca;

class MarcaController extends Controller
{
    public function getMarcas()
    {
        $marcaModel = new Marca();
        $marcas = $marcaModel->getMarcas();
        return $marcas;
    }
}
