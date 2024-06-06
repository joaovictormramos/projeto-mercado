<?php
namespace app\controllers;

use app\models\Estabelecimento;

class EstabelecimentoController extends Controller
{
    //Lista todos os estabelecimentos cadastrados.
    public function exibirEstabelecimento()
    {
        $estabelecimentos = new Estabelecimento();
        $estabelecimentos = $estabelecimentos->exibirEstabelecimento();
        return $estabelecimentos;
    }

}
