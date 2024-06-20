<?php
$this->layout('master', ['title' => 'Cadastrar marca']);
?>

<div class="container">
    <br>
    <h4>Cadastrar marca</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
    </div>
        <form action="/admin/cadastrarMarca" method="post" class="w-100">
            <div class="mb-1">
                <div class="col-md-5">
                    <label for="marcaNome" class="form-label">Marca</label>
                    <input name="marcaNome" type="text" class="form-control form-control-dark" placeholder="Marca...">
                </div>
            </div>
            <button class="btn btn-primary">Cadastrar produto</button>
        </form>
</div>