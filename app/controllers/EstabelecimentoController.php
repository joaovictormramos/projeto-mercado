<?php
namespace app\controllers;

use app\models\Estabelecimento;

class EstabelecimentoController extends Controller
{
    public function formCadastrarEstabelecimento()
    {
        $this->view('admin/cadastrarestabelecimento');
    }

    public function cadastrarEstabelecimento()
    {
        if (empty($_POST['estabelecimentonome']) || empty($_POST['endereco'])){
            echo 'Preencha todos os campos.';
        }
        $estabelecimentoNome = $_POST['estabelecimentonome'];
        $endereco = $_POST['endereco'];

        $estabelecimento = new Estabelecimento();
        $estabelecimento->cadastrarEstabelecimento($estabelecimentoNome, $endereco);
        $this->redirect('cadastrarestabelecimento');
    }
}
