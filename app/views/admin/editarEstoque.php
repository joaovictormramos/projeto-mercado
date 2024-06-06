<?php
$this->layout('master', ['title' => 'Editar estoque']);
?>
<table>
<?php
foreach ($estabelecimentoProdutos as $produto) {
    ?><tr>
        <td>
            <?php echo $produto->produto_produto; ?>
        </td>
        <td>
            <?php echo $produto->marca_nome; ?>
        </td>
        <td>
            <?php echo $produto->produto_medida . $produto->produto_unidademedida ?>
        </td>
        <td>
            R$<?php echo $produto->estabelecimento_produto_preco ?>
        </td>
    </tr>


<?php
}
?>
</table>

<h4>Cadastrar mais produtos</h1>
<form action="../estabelecimentoProduto/cadastrarProdutoEstabelecimento" method="post">
    <table>
<?php
foreach ($produtosACadastrar as $cadastrarProduto) {
    ?>  <tr>
            <td>
                <?php echo $cadastrarProduto->produto_produto; ?>
            </td>
            <td>
                <?php echo $cadastrarProduto->marca_nome; ?>
            </td>
            <td>
                <?php echo $cadastrarProduto->produto_medida . $cadastrarProduto->produto_unidademedida ?>
            </td>
            <td>
                <input type="hidden" name="estabelecimento_id" value="<?php echo $estabelecimentoId; ?>">
                <button name="produto_id" value="<?php echo $cadastrarProduto->produto_id; ?>">Cadastrar produto</button>
            </td>
        </tr>
<?php
}
?>
</table>
</form>
