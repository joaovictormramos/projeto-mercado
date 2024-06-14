<?php
$this->layout('master', ['title' => 'Minhas listas']);
?>
<div class="container">
    <h1>Produtos</h1>

    <?php
foreach ($listaprodutos as $produto) { ?>
    <p> <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' '
    . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida;}
?>

    </p>
</div>