<?php
$this->layout('master', ['title' => 'Detalhes lista']);
$lista_nome = $listaDesc[0]->lista_nome;
?>

<h2><?php echo $lista_nome; ?></h2>

<?php

foreach ($listaDesc as $produto) {?>
    <p><?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' '
    . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; ?></p>
<?php
}
?>
<a href="../minhaslistas">Retornar</a>