<?php
namespace app\controllers;

class AdminController extends Controller
{
    public function index()
    {
        $this->view('admin/painelAdmin');
    }

    //Usa o método exibirEstabelecimentos de EstabelecimentoController para enviar à view gerenciarEstabelecimento todos os estabelecimentos.
    public function gerenciarEstabelecimento()
    {
        $estabelecimentoController = new EstabelecimentoController();
        $estabelecimentos = $estabelecimentoController->exibirEstabelecimento();
        $this->view('admin/gerenciarEstabelecimento', ['estabelecimentos' => $estabelecimentos]);
    }

}
