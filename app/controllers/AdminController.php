<?php
namespace app\controllers;

class AdminController extends Controller
{
    public function painelAdmin()
    {
        $this->view('admin/paineladmin');

    }

    public function formCadastrarEstabelecimento()
    {
        $this->view('admin/formCadastrarEstabelecimento');

    }

    public function cadastrarEstabelecimento()
    {

    }

}
