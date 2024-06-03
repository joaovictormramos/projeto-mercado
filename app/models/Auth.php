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

    public function login($email, $senha)
    {
        $sql = "SELECT usuario_senha, usuario_nome_completo FROM tb_pjm_usuario
        WHERE usuario_email = (?) LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(\PDO::FETCH_OBJ);

        if (!$usuario || !password_verify($senha, $usuario->usuario_senha)) {
            echo 'Falha na autenticação.';
            return false;
        } else {
            session_start();
            $nome = explode(' ', $usuario->usuario_nome_completo);
            $_SESSION['usuario_nome'] = $nome[0] . ' ' . $nome[1];
            $_SESSION['usuario_email'] = $email;
            $_SESSION['logado'] = true;
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
}
