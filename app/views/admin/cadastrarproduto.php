<?php
$this->layout('master', ['title' => 'Gerenciar produtos']);
?>

<div class="container">
    <br>
    <h4>Cadastrar produto</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="/admin/gerenciarProduto">Voltar</a>
    </div>
    <?php echo $msgHtml; ?>
    <form enctype="multipart/form-data" action="/admin/cadastrarproduto" method="post" class="w-100">
        <div class="mb-1">
            <div class="col-md-5">
                <label for="produto" class="form-label">Produto</label>
                <input name="produto" type="text" class="form-control form-control-dark" placeholder="Produto...">
            </div>
            <div class="col-md-5">
                <label for="marcaId" class="form-label">Marca</label>
                <select name="marcaId" class="form-control">
                    <option value="">Selecionar...</option>
                    <?php foreach ($marcas as $marca) { ?>
                        <option value="<?php echo $marca->marcaid; ?>"><?php echo $marca->marcanome; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-5">
                <label for="medida" class="form-label">Medida</label>
                <input type="number" name="medida" id="" class="form-control">
            </div>
            <br>
            <div class="col-md-5">
                <div class="form-check form-check-inline">
                    <abbr title="Quilogramas"><label class="form-check-label" for="unidadeMedida">Kg</label></abbr>
                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="Kg">
                </div>
                <div class="form-check form-check-inline">
                    <abbr title="gramas"><label class="form-check-label" for="unidadeMedida">g</label></abbr>
                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="g">
                </div>
                <div class="form-check form-check-inline">
                    <abbr title="Litros"><label class="form-check-label" for="unidadeMedida">L</label></abbr>
                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="L">
                </div>
                <div class="form-check form-check-inline">
                    <abbr title="miliLitros"><label class="form-check-label" for="unidadeMedida">mL</label></abbr>
                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="mL">
                </div>
                <div class="form-check form-check-inline">
                    <abbr title="Unidade"><label class="form-check-label" for="unidadeMedida">U</label></abbr>
                    <input class="form-check-input" type="radio" name="unidadeMedida" id="" value="U">
                </div>
            </div>
            <div class="col-md-5">
                <label for="imgproduto" class="form-label">Imagem</label>
                <input accept="image/*" type="file" name="imgproduto" id="" class="form-control">
            </div>
            <input type="hidden" name="setorId" value="<?php echo $setorId; ?>">
            <input type="hidden" name="setorNome" value="<?php echo $setorNome; ?>">
        </div>
        <button class="btn btn-primary">Cadastrar produto</button>
    </form>
</div>