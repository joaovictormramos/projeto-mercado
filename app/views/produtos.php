<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
<h1>Produtos Listados</h1>

<?php
foreach ($listaprodutos as $produto) {
    echo '<div>' . $produto->produto_produto . ' ' . $produto->marca_nome . ' '
    . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida;
}
?>

</div>
