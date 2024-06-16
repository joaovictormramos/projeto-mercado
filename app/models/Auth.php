<?php

namespace app\models;

use app\config\Connect;

class Auth
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    //cadastro usuário
    public function cadastrarUsuario($nome, $cpf, $email, $senha)
    {
        $sql = "INSERT INTO tb_pjm_usuario(usuario_nome_completo, usuario_cpf, usuario_email, usuario_senha)
        VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(2, $cpf, \PDO::PARAM_STR);
        $stmt->bindParam(3, $email, \PDO::PARAM_STR);
        $stmt->bindParam(4, $senha, \PDO::PARAM_STR);
        $stmt->execute();
    }

    //login usuario
    public function login($email, $senha)
    {
        $sql = "SELECT usuario_senha, usuario_nome_completo, usuario_id FROM tb_pjm_usuario
                    WHERE usuario_email = (?) LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$usuario || !password_verify($senha, $usuario->usuario_senha)) {
            return false;
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $nome = explode(' ', $usuario->usuario_nome_completo);
            $_SESSION['nome'] = $nome[0] . ' ' . $nome[1];
            $_SESSION['email'] = $email;
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $usuario->usuario_id;
            return true;
        }

    }

    /*Em construção
    public function recuperarSenha($senha)
    {
    $sql = "INSERT INTO tb_pjm_usuario(usuario_senha)
    VALUES (?)";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1, $senha);
    $stmt->execute();
    }*/

    public function verificaCadastroEmail($email)
    {
        $sql = "SELECT verificaCadastroEmail(?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
        $emailCadastrado = $stmt->fetchColumn();

        return $emailCadastrado;

    }

    public function verificaCadastroCpf($cpf)
    {
        $sql = "SELECT verificaCadastroCPF(?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $cpf, \PDO::PARAM_STR);
        $stmt->execute();
        $cpfCadastrado = $stmt->fetchColumn();
        return $cpfCadastrado;
    }

    public function validaCPF($cpf)
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

    public function cadastrarAdmin($isAdmin, $nome, $cpf, $email, $senha)
    {
        $sql = "INSERT INTO tb_pjm_admin(is_admin, admin_nome, admin_cpf, admin_email, admin_senha)
            VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $isAdmin, \PDO::PARAM_BOOL);
        $stmt->bindParam(2, $nome, \PDO::PARAM_STR);
        $stmt->bindParam(3, $cpf, \PDO::PARAM_STR);
        $stmt->bindParam(4, $email, \PDO::PARAM_STR);
        $stmt->bindParam(5, $senha, \PDO::PARAM_STR);
        $stmt->execute();

    }

    //login admin
    public function loginAdmin($email, $senha)
    {
        $sql = "SELECT admin_senha, admin_nome, admin_id, is_admin FROM tb_pjm_admin
                WHERE admin_email = (?) LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
        $admin = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$admin || !password_verify($senha, $admin->admin_senha)) {
            return false;
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $nome = explode(' ', $admin->admin_nome);
            $_SESSION['nome'] = $nome[0] . ' ' . $nome[1];
            $_SESSION['email'] = $email;
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $admin->admin_id;
            $_SESSION['isAdmin'] = $admin->is_admin;
            return true;
        }
    }

    public function isAdmin($email)
    {
        $sql = "SELECT CAST(CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END AS BIT)
                FROM tb_pjm_admin WHERE admin_email = (?) ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_COLUMN);
        return $result;
    }

}
