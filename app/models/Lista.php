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

    public function criarLista($usuarioId, $listaNome = null, $agendamento = null, array $quantidades = [])
    {
        try {
            // Iniciar a transação
            $this->connection->beginTransaction();

            // Obter o próximo valor de usuario_lista_id para este usuário
            $sql = "SELECT COALESCE(MAX(usuario_lista_id), 0) + 1 AS proximo_usuario_lista_id FROM tb_pjm_lista WHERE usuario_id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(1, $usuarioId, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_OBJ);
            $nextUsuarioListaId = $result->proximo_usuario_lista_id;

            // Inserir a nova lista na tabela principal
            $sql = "INSERT INTO tb_pjm_lista (usuario_id, usuario_lista_id, lista_nome, lista_agendamento)
                VALUES (?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(1, $usuarioId, \PDO::PARAM_INT);
            $stmt->bindParam(2, $nextUsuarioListaId, \PDO::PARAM_INT);

            if ($listaNome !== null) {
                $stmt->bindParam(3, $listaNome, \PDO::PARAM_STR);
            } else {
                $listaNome = 'Lista ' . $result->proximo_usuario_lista_id;
                $stmt->bindValue(3, $listaNome, \PDO::PARAM_STR);
            }

            if ($agendamento !== null) {
                $stmt->bindParam(4, $agendamento, \PDO::PARAM_STR);
            } else {
                $stmt->bindValue(4, null, \PDO::PARAM_NULL);
            }

            $stmt->execute();

            // Obter o ID da nova lista inserida
            $listaId = $this->connection->lastInsertId();

            // Inserir os itens da lista na tabela de itens
            $sqlItem = "INSERT INTO tb_pjm_itens_lista (lista_id, produto_id, lista_produto_qtd)
                        VALUES (?, ?, ?)";
            $stmtItem = $this->connection->prepare($sqlItem);

            foreach ($quantidades as $produtoId => $quantidadeProduto) {
                $stmtItem->bindParam(1, $listaId, \PDO::PARAM_INT);
                $stmtItem->bindParam(2, $produtoId, \PDO::PARAM_INT);
                $stmtItem->bindParam(3, $quantidadeProduto, \PDO::PARAM_INT);
                $stmtItem->execute();
            }

            // Confirmar a transação
            $this->connection->commit();
        } catch (\Exception $e) {
            // Reverter a transação em caso de erro
            $this->connection->rollBack();
            throw $e;
        }
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

    public function detalheLista($listaId)
    {
        $sql = "SELECT lista.lista_nome, lista.lista_agendamento, lista.lista_id, produto.produto_produto,
                marca.marca_nome, produto.produto_medida, produto.produto_unidademedida, produto.produto_caminho_img, itenslista.lista_produto_qtd
                FROM tb_pjm_lista lista
                JOIN tb_pjm_itens_lista itenslista ON itenslista.lista_id = lista.lista_id
                JOIN tb_pjm_produto produto ON produto.produto_id = itenslista.produto_id
                JOIN tb_pjm_marca marca ON produto.marca_id = marca.marca_id
                WHERE lista.lista_id = (?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $listaId, \PDO::PARAM_INT);
        $stmt->execute();

        $listaDesc = $stmt->fetchAll(\PDO::FETCH_OBJ);
        
        return $listaDesc;
    }
}
