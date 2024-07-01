<?php
namespace app\controllers;

use app\models\Estabelecimento;

class EstabelecimentoController extends Controller
{

    public function index()
    {
        $estabelecimentos = $this->exibirEstabelecimento();
        $this->view('estabelecimentos', ['estabelecimentos' => $estabelecimentos]);
    }

    //Lista todos os estabelecimentos cadastrados.
    public function exibirEstabelecimento()
    {
        $estabelecimentos = new Estabelecimento();
        $estabelecimentos = $estabelecimentos->exibirEstabelecimento();
        return $estabelecimentos;
    }

    public function cadastrarEstabelecimento($estabelecimentoNome, $estabelecimentoEndereco)
    {
        $estabelecimento = new Estabelecimento();
        $erro = $estabelecimento->cadastrarEstabelecimento($estabelecimentoNome, $estabelecimentoEndereco);
        return $erro;
    }

}
