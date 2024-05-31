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
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $cpf);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $senha);
        $stmt->execute();
    }

    public function login($email, $senha)
    {
        $sql = "SELECT usuario_senha, usuario_nome_completo FROM tb_pjm_usuario
        WHERE usuario_email = (?) LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->execute();
        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$usuario || !password_verify($senha, $usuario['usuario_senha'])) {
            echo 'Falha na autenticação.';
            return false;
        } else {
            session_start();
            $nome = explode(' ', $usuario['usuario_nome_completo']);
            $_SESSION['usuario_nome'] = $nome[0] . ' ' . $nome[1];
            $_SESSION['usuario_email'] = $email;
            $_SESSION['logado'] = true;
            return true;
        }
    }

    public function recuperarSenha()
    {

    }
}
