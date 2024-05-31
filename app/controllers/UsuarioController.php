<?php
namespace app\controllers;

class UsuarioController extends Controller
{
    public function dashboard()
    {
        session_start();

        if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
            $this->redirect('/');
            exit();
        }

        $dadosUsuario = [
            'nome' => $_SESSION['usuario_nome'],
            'email' => $_SESSION['usuario_email'],
        ];
        $this->view('usuario/perfil', $dadosUsuario);
    }

}
