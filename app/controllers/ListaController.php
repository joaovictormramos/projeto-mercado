<?php
namespace app\controllers;

class ListaController extends Controller
{
    public function formCriaLista()
    {
        $this->view('usuario/criarlista', ['title' => 'Criar lista']);
    }

    public function criarLista()
    {

    }

}
