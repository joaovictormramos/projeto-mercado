<?php
$this->layout('master', ['title' => 'Gerenciar produtos']);
?>

<div class="container">
    <form enctype="multipart/form-data" action="/admin/cadastrarproduto" method="post" class="w-100">
        <div class="mb-1">
            <div class="col-md-3">
                <label for="produto" class="form-label">Produto</label>
                <input name="produto" type="text" class="form-control form-control-dark" placeholder="Produto...">
            </div>
            <div class="col-md-3">
                <label for="marca" class="form-label">Marca</label>
                <select name="marca" class="form-control">
                    <option value="">selecionar...</option>
                    <?php foreach ($marcas as $marca) { ?>
                    <option value="<?php echo $marca->marcaid; ?>"><?php echo $marca->marcanome; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="medida" class="form-label">Medida</label>
                <input type="number" name="medida" id="" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="unidadeMedida" class="form-label">Unidade de Medida</label>
                <select name="unidadeMedida" class="form-control">
                    <option value="">selecionar...</option>
                    <option value="Kg">Kg</option>
                    <option value="g">g</option>
                    <option value="L">L</option>
                    <option value="mL">mL</option>
                    <option value="U">U</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="arquivo" class="form-label">Imagem</label>
                <input accept="image/*" type="file" name="produto_caminho_img" id="" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary">Cadastrar produto</button>
    </form>
</div>