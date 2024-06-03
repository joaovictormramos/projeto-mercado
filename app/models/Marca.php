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
        $sql = "SELECT marca_id, marca_nome FROM tb_pjm_marca ORDER BY marca_nome";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $marcas = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $marcas;
    }
}
