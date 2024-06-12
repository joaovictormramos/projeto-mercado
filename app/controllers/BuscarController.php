<?php
namespace app\controllers;

use app\models\Busca;

class BuscarController extends Controller
{
    public function result()
    {
        $palavra = null;

        if (isset($_GET['palavra-chave'])) {
            $palavra = $_GET['palavra-chave'];
        }
        $busca = new Busca();
        $resultado = $busca->result($palavra);
        $resultado;
        $this->view('resultado', ['resultado' => $resultado]);

    }
}
