<?php
namespace app\controllers;

use app\models\Estabelecimento;

class EstabelecimentoController extends Controller
{
    public function formGerenciarEstabelecimento()
    {
        $estabelecimentos = new Estabelecimento();
        $estabelecimentos = $estabelecimentos->getAllEstabelecimentos();
        $this->view('admin/gerenciarEstabelecimento', ['estabelecimentos' => $estabelecimentos]);

    }

    public function formEditarEstoque()
    {
        var_dump($_POST);
        $this->view('admin/editarestoque');

    }

    public function formCadastrarEstabelecimento()
    {
        $this->view('admin/cadastrarEstabelecimento');

    }

    public function cadastrarEstabelecimento()
    {
        if (empty($_POST['estabelecimentonome']) || empty($_POST['endereco'])) {
            echo 'Preencha todos os campos.';
        }
        $estabelecimentoNome = $_POST['estabelecimentonome'];
        $endereco = $_POST['endereco'];

        $estabelecimento = new Estabelecimento();
        $estabelecimento->cadastrarEstabelecimento($estabelecimentoNome, $endereco);
        $this->redirect('cadastrarestabelecimento');

    }

    public function formGerenciarProdutos()
    {
        $this->view('admin/gerenciarProdutos');
    }

    public function gerenciarEstoque($estabelecimentoId)
    {
        
    }
}
