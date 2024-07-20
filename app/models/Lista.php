<?php
namespace app\models;

use app\config\Connect;

class Lista
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function criarLista($usuarioId, $listName, $appointmentDay)
    {
        // Inserir a nova lista na tabela principal
        $sql = "INSERT INTO tb_pjm_lista (usuario_id, lista_nome, lista_agendamento)
                VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $usuarioId, \PDO::PARAM_INT);
        $stmt->bindParam(2, $listName, \PDO::PARAM_STR);
        $stmt->bindParam(3, $appointmentDay, \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function minhasListas($usuarioId)
    {
        $sql = "SELECT lista.lista_nome, lista.lista_id FROM tb_pjm_lista lista WHERE lista.usuario_id = (?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $usuarioId, \PDO::PARAM_INT);
        $stmt->execute();
        $minhasLista = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $minhasLista;
    }

    public function detalheLista($listID)
    {
        $sql = "SELECT lista.lista_nome, lista.lista_agendamento, lista.lista_id, produto.produto_produto,
                marca.marca_nome, produto.produto_medida, produto.produto_unidademedida, produto.produto_caminho_img, itenslista.lista_produto_qtd
                FROM tb_pjm_lista lista
                FULL OUTER JOIN tb_pjm_itens_lista itenslista ON itenslista.lista_id = lista.lista_id
                FULL OUTER JOIN tb_pjm_produto produto ON produto.produto_id = itenslista.produto_id
                FULL OUTER JOIN tb_pjm_marca marca ON produto.marca_id = marca.marca_id
                WHERE lista.lista_id = (?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $listID, \PDO::PARAM_INT);
        $stmt->execute();

        $listaDesc = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $listaDesc;
    }

    public function deleteList($listID)
    {
        $sql = "DELETE FROM tb_pjm_lista WHERE lista_id = (?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $listID, \PDO::PARAM_INT);
        try {
            $stmt->execute();
        } catch (\PDOException) {
            $message = "Erro ao excluir lista.";
            return $message;
        }
    }
}
