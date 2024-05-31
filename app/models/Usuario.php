<?php

namespace app\models;

use app\config\Connect;

class Usuario
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function criarLista()
    {

    }

    public function excluirLista()
    {

    }

    public function editarLista()
    {
        
    }

}
