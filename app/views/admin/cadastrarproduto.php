<?php
$this->layout('master', ['title' => 'Gerenciar produtos']);
?>

<div class="container">
    <form enctype="multipart/form-data" action="" class="w-100">
         <!-- Linha para os labels -->
        <div class="row mb-1">
            <div class="col-md-2">
                <label for="produto" class="form-label">Produto</label>
            </div>
            <div class="col-md-2">
                <label for="marca" class="form-label">Marca</label>
            </div>
            <div class="col-md-2">
                <label for="quantidade" class="form-label">Medida</label>
            </div>
            <div class="col-md-2">
                <label for="unidadeMedida" class="form-label">Unidade de Medida</label>
            </div>
            <div class="col-md-4">
                <label for="arquivo" class="form-label">Imagem</label>
            </div>
        </div>
        <!-- Linha para os inputs -->
        <div class="row mb-3">
            <div class="col-md-2">
                <input name="produto" type="text" class="form-control form-control-dark" placeholder="Produto...">
            </div>
            <div class="col-md-2">
                <select name="marca" class="form-control">
                    <option value=""></option>
                    <?php foreach ($marcas as $marca) { ?>
                    <option value="<?php echo $marca->marcaid; ?>"><?php echo $marca->marcanome; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" name="" id="" class="form-control">
            </div>
            <div class="col-md-2">
                <select name="unidadeMedida" class="form-control">
                    <option value=""></option>
                    <option value="Kg">Kg</option>
                    <option value="g">g</option>
                    <option value="L">L</option>
                    <option value="mL">mL</option>
                    <option value="U">U</option>
                </select>
            </div>
            <div class="col-md-4">
                <input accept="image/*" type="file" name="produto_caminho_img" id="" class="form-control">
            </div>
            <button>Cadastrar produto</button>
        </div>
    </form>
</div>