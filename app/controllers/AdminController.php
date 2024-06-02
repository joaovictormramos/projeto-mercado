<?php
namespace app\controllers;

class AdminController extends Controller
{
    public function painelAdmin()
    {
        $this->view('admin/paineladmin', ['title' => 'Painel de administração']);

    }

    public function formCadastrarEstabelecimento()
    {
        $this->view('admin/formCadastrarEstabelecimento', ['title' => 'Cadastrar estabelecimento']);

    }

    public function cadastrarEstabelecimento()
    {

    }

}
