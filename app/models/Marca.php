<?php
namespace app\models;

use app\config\Connect;

class Marca
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function getMarcas()
    {
        $sql = "SELECT marca_id AS marcaid, marca_nome AS marcanome FROM tb_pjm_marca ORDER BY marca_nome";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $marcas = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $marcas;
    }

    public function buscarMarca($palavra)
    {
        $sql = "SELECT marca.marca_nome, marca.marca_id FROM tb_pjm_marca marca WHERE marca.marca_nome ILIKE (?)";
        if (!empty($palavra)) {
            $palavra = "%" . $palavra . "%";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(1, $palavra, \PDO::PARAM_STR);
            $stmt->execute();
            $buscaResult = $stmt->fetchAll(\PDO::FETCH_OBJ);
            return $buscaResult;

        }

    }
}
