<?php
$this->layout('master', ['title' => 'Detalhes lista']);
$lista_nome = $listaDesc[0]->lista_nome;
?>
<div class="container">
    <br>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-printer-fill" viewBox="0 0 16 16">
                <path
                    d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1">
                </path>
                <path
                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1">
                </path>
            </svg>
        </button>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <h2><?php echo $lista_nome; ?></h2>
    </div>
    <table class="table table-bordered border-primary">
        <tbody>
            <tr>
                <td colspan="2">
                    <h4>Produto</h4>
                </td>
                <td>
                    <h4>Quantidade</h4>
                </td>
                <td>
                    <h4>Preço (Unidade)</h4>
                </td>
            </tr>
            <tr>
                <?php
foreach ($listaDesc as $produto) {?>
                <td class="align-middle">
                    <img width="70px" src="<?php echo $produto->produto_caminho_img; ?>" alt="">
                </td>
                <td class="align-middle">
                    <p>
                        <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; ?>
                    </p>
                </td>
                <td class="align-middle">
                    <p>
                        <?php echo $produto->lista_produto_qtd; ?>
                    </p>
                </td>
                <td class="align-middle">
                    <p>R$ </p>
                </td>
            </tr>
            <?php
}
?> <tr>
                <td colspan="2">
                    <strong>TOTAL</strong>
                </td>
                <td>
                    <?php $totalProd = 0;
foreach ($listaDesc as $produto) {
    $totalProd += $produto->lista_produto_qtd;
}?>
                    <strong><?php echo $totalProd; ?></strong>

                </td>
                <td>
                    <strong>R$</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-primary m-2" href="../minhaslistas">Retornar</a>
</div>
<?php var_dump($listaDesc);