<?php
$this->layout('master', ['title' => 'Produto']);
?>

<h4> <?php echo $descProduto->produto_produto . ' ' . $descProduto->marca_nome . ' ' . $descProduto->produto_medida . $descProduto->produto_unidademedida; ?> </h4>
<h4>Defina o preço</h4>

<form action="confirmaCadastro" method="post">
    <b><label for="preco">R$</label></b>
    <input type="hidden" name="estabelecimento_id" value=" <?php echo $estabelecimentoId; ?> ">
    <input type="hidden" name="produto_id" value=" <?php echo $produtoId; ?> ">
    <input name="preco" type="number" inputmode="numeric" step="0.01">
    <button>Cadastrar</button>
</form>