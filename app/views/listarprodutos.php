<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);


echo '<h1>Produtos Listados</h1>';

foreach ($listaprodutos as $produto) {
    echo '<div>' . $produto->produto_produto . ' ' . $produto->marca_nome . ' '
        . $produto->produto_medida . $produto->produto_unidademedida;
}
