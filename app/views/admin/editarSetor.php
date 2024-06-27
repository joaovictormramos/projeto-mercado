<?php
$this->layout('master', ['title' => 'Gerenciar produtos']);
?>
<br>
<h4><?php echo $setorNome; ?></h4>
<div class="container">
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
        <form class="w-25 t-3" role="search" action="" method="">
            <input name="palavra-chave" type="search" class="form-control form-control-dark"
                placeholder="Buscar produto..." aria-label="Search">
        </form>
        <form class="form ms-auto" action="/admin/cadastrarproduto" method="get">
            <button class="btn btn-primary ms-auto">Cadastrar novo produto</button>
            <input type="hidden" name="setorNome" value="<?php echo $setorNome; ?>">
            <input type="hidden" name="setorId" value="<?php echo $setorId; ?>">
        </form>
    </div>
    <br>
    <table class="table table-bordered border-primary">
        <tbody>
            <tr>
                <td class="align-middle">
                    <h5>ID</h5>
                </td>
                <td class="align-middle">
                    <h5>PRODUTO</h5>
                </td>
                <td class="align-middle">
                    <h5>IMAGEM</h5>
                </td>
                <td class="align-middle">
                    <h5>AÇÕES</h5>
                </td>
            </tr>
            <?php foreach ($produtosPorSetor as $setorNome => $produtos) {
            foreach ($produtos as $produto) {
                if ($produto->setor_id == $setorId) {
                    $produtoCompleto = $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; 
                    ?>
            <tr>
                <td class="align-middle">
                    <h5><?php echo $produto->produto_id; ?></h5>
                </td>
                <td class="align-middle">
                    <h5><?php echo $produtoCompleto; ?></h5>
                </td>
                <td class="align-middle">
                    <img src="<?php echo $produto->produto_caminho_img; ?>" class="img-thumbnail" width="200px"
                        alt="<?php echo $produtoCompleto; ?>">
                </td>
                <td class="align-middle">
                    <abbr title="Editar produto">
                        <button type="button" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z">
                                </path>
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z">
                                </path>
                            </svg>
                            Editar
                        </button>
                    </abbr>
                    <abbr title="Excluir produto">
                        <button type="button" class="btn btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0">
                                </path>
                            </svg>
                            Excluir
                        </button>
                    </abbr>
                </td>
            </tr>
            <?php
            }
    }
}?>
        </tbody>
    </table>
</div>