<?php
namespace app\controllers;

use app\models\Lista;

class ListaController extends Controller
{
    public function criarLista($usuarioId, $listaNome = null, $data = null, array $quantidades = [])
    {
        $listaModel = new Lista();
        $listaModel->criarLista($usuarioId, $listaNome, $data, $quantidades);
        $this->redirect('criarlista');
    }

    public function minhasListas($usuarioId)
    {
        $lista = new Lista();
        $listasUsuario = $lista->minhasListas($usuarioId);
        return $listasUsuario;
    }

    public function detalheLista($listaId)
    {
        $lista = new Lista();
        $listaDesc = $lista->detalheLista($listaId);
        return $listaDesc;
    }

}
