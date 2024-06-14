<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
<h2 class="text-start">Resultado da busca</h2>

<?php
foreach ($resultado['marcas'] as $marca) {
    echo $marca->marca_nome . '<br>';
}

foreach ($resultado['produtos'] as $produto) {
    echo $produto->produto_produto . ' ' . $produto->marca_nome . ' '
    . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida . '<br>';
}
?>

</div>