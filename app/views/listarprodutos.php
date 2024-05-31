<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
var_dump($listarprodutos);
foreach ($produtos as $produto) {
    echo '<div>' . $produto['produto'] . ' ' . $produto['marca_nome'] . ' '
        . $produto['medida'] . $produto['unidademedida'];
}
