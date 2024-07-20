<?php
$this->layout('master', ['title' => 'Editar estoque']);
?>
<h1><?php echo $erro; ?></h1>
<div class="container">
    <h2><?php echo $nomeEstabelecimento; ?></h2>
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
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-home-tab" role="tablist"
                    aria-orientation="vertical">
                    <?php foreach ($setores as $setor): ?>
                    <button class="nav-link" id="v-pills-home-<?=$setor->setor_id?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home-<?=$setor->setor_id?>" type="button" role="tab" aria-controls="v-pills-home-<?=$setor->setor_id?>" aria-selected="false">
                        <?=$setor->setor_nome?>
                    </button>
                    <?php endforeach;?>
                </div>

                <div class="tab-content" id="v-pills-home-tabContent">
                    
                <?php foreach ($setores as $setor): ?>
                    <div class="tab-pane fade" id="v-pills-home-<?=$setor->setor_id?>" role="tabpanel" aria-labelledby="v-pills-home-<?=$setor->setor_id?>-tab">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>R$</th>
                                </tr>
                            </thead>
                            <?php foreach ($estabelecimentoProdutos as $produto): ?>
                            <tr>
                            <?php if ($produto->setor_id == $setor->setor_id): ?>
                                <td>
                                <?php
$produtoCompleto = $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida . ' </td><td>R$' . number_format($produto->estabelecimento_produto_preco, 2, ',');
echo $produtoCompleto;
?>                              </td>

                        <?php endif;?>
                                </tr>
                        
                        <?php endforeach;?>
                        </table>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-profile-tab" role="tablist"
                    aria-orientation="vertical">
                    <?php foreach ($setores as $setorNaoCadastrado): ?>
                    <button class="nav-link" id="v-pills-profile-<?=$setorNaoCadastrado->setor_id?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile-<?=$setorNaoCadastrado->setor_id?>" type="button" role="tab" aria-controls="v-pills-profile-<?=$setorNaoCadastrado->setor_id?>" aria-selected="false">
                        <?=$setorNaoCadastrado->setor_nome?>
                    </button>
                    <?php endforeach;?>
                </div>
                <div class="tab-content" id="v-pills-profile-tabContent">
                    <?php foreach ($setores as $setorNaoCadastrado): ?>
                    <div class="tab-pane fade" id="v-pills-profile-<?=$setorNaoCadastrado->setor_id?>" role="tabpanel" aria-labelledby="v-pills-profile-<?=$setorNaoCadastrado->setor_id?>-tab">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Preço</th>
                                    <th>Cadastrar</th>
                                </tr>
                            </thead>
                            <?php foreach ($produtosACadastrar as $produtoACadastrar): ?>
                            <form action="/admin/cad" method="post">
                                <tr>
                                    <?php if ($produtoACadastrar->setor_id == $setorNaoCadastrado->setor_id): ?>
                                    <td>
                                        <?php
echo $produtoACadastrar->produto_produto . ' ' . $produtoACadastrar->marca_nome . ' ' . str_replace('.', ',', (string) $produtoACadastrar->produto_medida) . $produtoACadastrar->produto_unidademedida;
?>
                                    </td>
                                    <td>
                                        <input type="text" name="preco[<?=$produtoACadastrar->produto_id?>]" id="">
                                    </td>
                                    <td>
                                        <input type="checkbox" name="produtos[]" value="<?php echo $produtoACadastrar->produto_id; ?>" id="">
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    </td>
                                </tr>
                                <input type="hidden" name="estabelecimentoId" value="<?php echo $estabelecimentoId; ?>">
                                <tr>
                                    <td colspan=3>
                                        <button class="btn btn-success">Cadastrar produtos selecionados</button>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>