<?php
$this->layout('master', ['title' => 'Detalhes lista']);
$lista_nome = $listaDesc[0]->lista_nome;
?>
<div class="container">
    <br>
    <div class="row">
        <div class="btn-group" role="group" aria-label="Basic example">
            <form action="/usuario/deletarlista" method="post">
                <input type="hidden" name="listID" value="<?php echo $listaDesc[0]->lista_id; ?>">
                <button type="submit" class="btn btn-outline-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                        </path>
                    </svg>
                    Excluir
                </button>
            </form>
            <form action="/usuario/editarlista" method="post">
                <p><?php echo $listaDesc[0]->lista_nome; ?></p>
                <button type="submit" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                        </path>
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z">
                        </path>
                    </svg>
                    Editar
                </button>
            </form>

            <div class="col text-end">
                <button type="button" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                        <path
                            d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1">
                        </path>
                        <path
                            d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
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