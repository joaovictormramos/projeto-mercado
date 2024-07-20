<?php
namespace app\controllers;

use app\models\Lista;

class ListaController extends Controller
{
    public function criarLista($userID, $listName, $appointmentDay)
    {
        $listaModel = new Lista();
        $listaModel->criarLista($userID, $listName, $appointmentDay);
    }

    public function minhasListas($usuarioID)
    {
        $lista = new Lista();
        $listasUsuario = $lista->minhasListas($usuarioID);
        return $listasUsuario;
    }

    public function detalheLista($listID)
    {
        $lista = new Lista();
        $listaDesc = $lista->detalheLista($listID);
        return $listaDesc;
    }

    public function deleteList($listID)
    {
        $list = new Lista();
        $message = $list->deleteList($listID);
        return $message;
    }

}
