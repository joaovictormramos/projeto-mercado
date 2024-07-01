<?php
$this->layout('master', ['title' => 'Gerenciar produtos']);
?>

<div class="container">
    <br>
    <h4 class="text-center">Cadastrar produto</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="/admin/gerenciarProduto">Voltar</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (isset($msgHtml)) {
                echo $msgHtml;
            }
            ?>
            <form enctype="multipart/form-data" action="/admin/cadastrarproduto" method="post" class="w-100">
                <div class="mb-1">
                    <div class="mb-3">
                        <label for="produto" class="form-label">Produto</label>
                        <input name="produto" type="text" class="form-control form-control-dark"
                            placeholder="Produto...">
                    </div>
                    <div class="mb-3">
                        <label for="marcaIdNome" class="form-label">Marca</label>
                        <select name="marcaIdNome" class="form-control">
                            <option value="">Selecionar...</option>
                            <?php var_dump($marcas); foreach ($marcas as $marca) {?>
                            <option value="<?php echo $marca->marcaid . '|' . $marca->marcanome; ?>">
                                <?php echo $marca->marcanome; ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-row mb-3">
                        <div class="d-flex">
                            <div class="col-md-4 m-3">
                                <label for="medida" class="form-label">Medida</label>
                                <input type="number" name="medida" id="" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-8 d-flex align-items-end m-3">
                                <div class="form-check form-check-inline">
                                    <abbr title="Quilogramas"><label class="form-check-label"
                                            for="unidadeMedida">Kg</label></abbr>
                                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="Kg">
                                </div>
                                <div class="form-check form-check-inline">
                                    <abbr title="gramas"><label class="form-check-label"
                                            for="unidadeMedida">g</label></abbr>
                                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="g">
                                </div>
                                <div class="form-check form-check-inline">
                                    <abbr title="Litros"><label class="form-check-label"
                                            for="unidadeMedida">L</label></abbr>
                                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="L">
                                </div>
                                <div class="form-check form-check-inline">
                                    <abbr title="miliLitros"><label class="form-check-label"
                                            for="unidadeMedida">mL</label></abbr>
                                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="mL">
                                </div>
                                <div class="form-check form-check-inline">
                                    <abbr title="Unidade"><label class="form-check-label"
                                            for="unidadeMedida">Unidades</label></abbr>
                                    <input class="form-check-input" type="radio" name="unidadeMedida" id=""
                                        value="Unidades">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input name="descricao" type="text" class="form-control form-control-dark"
                            placeholder="Descrição...">
                    </div>
                    <div class="mb-3">
                        <label for="imgproduto" class="form-label">Imagem</label>
                        <input accept="image/*" type="file" name="imgproduto" id="" class="form-control">
                    </div>
                    <input type="hidden" name="setorId" value="<?php echo $setorId; ?>">
                    <input type="hidden" name="setorNome" value="<?php echo $setorNome; ?>">
                </div>
                <button class="btn btn-primary w-100 m-3">Cadastrar produto</button>
            </form>
        </div>
    </div>
</div>