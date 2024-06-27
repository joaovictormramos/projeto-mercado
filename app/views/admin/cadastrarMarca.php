<?php
$this->layout('master', ['title' => 'Cadastrar marca']);
?>

<div class="container">
    <br>
    <h4>Cadastrar marca</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
    </div>
    <div>
        <form enctype="multipart/form-data" action="/admin/cadastrarMarca" method="post" class="w-100">
            <div class="mb-1">
                <div class="col-md-5">
                    <label for="marcaNome" class="form-label">Marca</label>
                    <input name="marcaNome" type="text" class="form-control form-control-dark" placeholder="Marca...">
                </div>
            </div>
            <div class="col-md-5">
                <label for="imgMarca" class="form-label">Imagem</label>
                <input accept="image/*" type="file" name="imgMarca" id="" class="form-control">
            </div>
            <button class="btn btn-primary">Cadastrar marca</button>
        </form>
    </div>
</div>