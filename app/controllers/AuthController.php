<?php
namespace app\controllers;

use app\models\Auth;

class AuthController extends Controller
{
    //cadastrar usuário
    public function cadastrar()
    {
        $auth = new Auth();

        $this->view('auth/cadastrar');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['nomeCompleto']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['senha'])) {
                echo 'Preencha todos os campos';

            } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo 'Email inválido.';

            } else if ($auth->verificaCadastroEmail($_POST['email'])) {
                echo 'Email já cadastrado.';

            } else if (!$auth->validaCPF($_POST['cpf'])) {
                echo 'CPF inválido.';

            } else if ($auth->verificaCadastroCpf($_POST['cpf'])) {
                echo 'CPF já cadastrado.';

            } else if ($_POST['senha'] != $_POST['confirmaSenha']) {
                echo 'Senhas não coincidem.';

            } else {
                $caracteresEspeciais = '/[^a-zA-Z\sçÇáéíóúÁÉÍÓÚâêîôÂÊÎÔãõÃÕàÀüÜ]/u';
                $nome = preg_replace($caracteresEspeciais, '', trim(ucwords($_POST['nomeCompleto'])));
                $cpf = trim($_POST['cpf']);
                $email = trim($_POST['email']);
                $senha = trim(password_hash($_POST['senha'], PASSWORD_DEFAULT));

                $auth->cadastrarUsuario($nome, $cpf, $email, $senha);

                $this->redirect('../');
            }
        }
    }

    //login usuário
    public function login()
    {
        session_start();
        $auth = new Auth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['email']) || empty($_POST['senha'])) {
                $erro = 'Campos não preenchidos.';

            } else {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                if ($auth->login($email, $senha) == true) {
                    $nome = $_SESSION['usuario_nome'];

                    $produtosController = new ProdutoController();
                    $produtosPorSetor = $produtosController->listarProdutos();

                    $this->view('home', ['nome' => $nome, 'produtosPorSetor' => $produtosPorSetor]);
                    $this->redirect('/');
                    return;

                } else {
                    $erro = 'E-mail ou senha incorretos.';
                }
            }
            $erroHtml = '<div class="alert alert-danger" role="alert">' . $erro . '</div>';
            $this->view('auth/login', ['erro' => $erroHtml]);

        } else {
            $this->view('auth/login');
        }
    }

    //sair
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect('/');
        exit();
    }

    public function cadastrarAdmin()
    {
        $auth = new Auth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
        }

        else {
            $this->view('auth/cadastro_admin');
        }
    }

}
