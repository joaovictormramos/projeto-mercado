<?php
namespace app\controllers;

use app\models\Auth;

class AuthController extends Controller
{
    public function formCadastrarUsuario()
    {
        $this->view('auth/cadastrar', ['title' => 'Criar conta - SupportMercado']);
    }

    public function cadastrar()
    {
        if (empty($_POST['nomeCompleto']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['senha'])) {
            echo 'Preencha todos os campos';

        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo 'Email inválido.';

        } else if (!self::validaCPF($_POST['cpf'])) {
            echo 'CPF inválido.';

        } else if ($_POST['senha'] != $_POST['confirmaSenha']) {
            echo 'Senhas não coincidem.';

        } else {
            $nome = trim(ucwords($_POST['nomeCompleto']));
            $cpf = trim($_POST['cpf']);
            $email = trim($_POST['email']);
            $senha = trim(password_hash($_POST['senha'], PASSWORD_DEFAULT));

            $auth = new Auth();
            $auth->cadastrarUsuario($nome, $cpf, $email, $senha);

            $this->redirect('../');
        }
    }

    public function formLogin()
    {
        $this->view('auth/login', ['title' => 'Entrar - SupportMercado']);
    }

    public function login()
    {
        session_start();

        if (empty($_POST['email']) || empty($_POST['senha'])) {
            echo 'Campos não preenchidos.';
        } else {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $auth = new Auth();

            if ($auth->login($email, $senha) == true) {
                $nome = $_SESSION['usuario_nome'];
                $this->view('home', ['title' => 'Home', 'nome' => $nome]);
                $this->redirect('/');
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect('/');
        exit();
    }

    public function recuperarSenha()
    {

    }

    private static function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }

}
