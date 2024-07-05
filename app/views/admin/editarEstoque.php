<?php
$this->layout('master', ['title' => 'Editar estoque']);
?>

<div class="container">
    <h2> <?php echo $nomeEstabelecimento; ?> </h2>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Cadastrados</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Não cadastrados</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
    </div>
</div>