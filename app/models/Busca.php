<?php

namespace app\models;

use app\config\Connect;
use app\controllers\MarcaController;
use app\controllers\ProdutoController;

class Busca
{
    private $connection;

    public function __construct()
    {
        $this->connection = Connect::connectDatabase();
    }

    public function result($palavra)
    {   
        $resultBusca = array();
        
        $produtoController = new ProdutoController();
        $resultProdutos = $produtoController->buscarProduto($palavra);
        $resultBusca['produtos'] = $resultProdutos;

        $marcaController = new MarcaController();
        $resultMarca = $marcaController->buscarMarca($palavra);
        $resultBusca['marcas'] = $resultMarca;
        
        return $resultBusca;
    }

}
