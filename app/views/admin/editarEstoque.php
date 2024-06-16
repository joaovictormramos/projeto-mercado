<?php
$this->layout('master', ['title' => 'Editar estoque']);
?>

<div class="container">
    <h2> <?php echo $nomeEstabelecimento; ?> </h2>
    <table>
        <?php
foreach ($estabelecimentoProdutos as $produto) {
    ?><tr>
            <td>
                <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) .
    $produto->produto_unidademedida . ' R$' . number_format($produto->estabelecimento_produto_preco, 2, ','); ?>
            </td>
        </tr>
        <?php
}
?>
    </table>

    <h4>Cadastrar mais produtos</h1>
        <form action="/estabelecimentoProduto/cadastrarProdutoEstabelecimento" method="post">
            <table>
                <?php
foreach ($produtosACadastrar as $cadastrarProduto) {
    ?> <tr>
                    <td>
                        <?php echo $cadastrarProduto->produto_produto; ?>
                    </td>
                    <td>
                        <?php echo $cadastrarProduto->marca_nome; ?>
                    </td>
                    <td>
                        <?php echo str_replace('.', ',', (string) $cadastrarProduto->produto_medida) . $cadastrarProduto->produto_unidademedida ?>
                    </td>
                    <td>
                        <input type="hidden" name="estabelecimento_id" value="<?php echo $estabelecimentoId; ?>">
                        <button name="produto_id" value="<?php echo $cadastrarProduto->produto_id; ?>">Cadastrar
                            produto</button>
                    </td>
                </tr>
                <?php
}
?>
            </table>
        </form>
</div>