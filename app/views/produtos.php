<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
    <h1>Produtos</h1>

    <?php
foreach ($listaprodutos as $produto) {
    var_dump($produto); ?>
    <div> <?php $produto->produto_produto . ' ' . $produto->marca_nome . ' '
    . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida;}
?>

    </div>