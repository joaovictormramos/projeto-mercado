<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
foreach ($listarprodutos as $produto) {
    echo '<div>' . $produto['produto'] . ' ' . $produto['marca_nome'] . ' '
        . $produto['medida'] . $produto['unidademedida'];
}
