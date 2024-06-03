<?php
namespace app\controllers;

use app\models\Estabelecimento;

class EstabeleciemntoController extends Controller
{
    public function formCadastrarEstabelecimento()
    {
        $this->view('admin/cadastrarEstabelecimento');
    }

    public function cadastrarEstabelecimento()
    {
        if (empty($_POST['estabelecimento']))
        $estabelecimento = new Estabelecimento();
    }
}
