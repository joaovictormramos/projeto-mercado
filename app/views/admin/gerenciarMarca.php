<?php
$this->layout('master', ['title' => 'Gerenciar marcas']);
?>
<br>
<h4>Marcas</h4>
<div class="container">
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
        <a class="btn btn-primary ms-auto" href="/admin/cadastrarmarca">Cadastrar nova marca</a>
    </div>
    <br>
    <div class="row">
        <?php foreach ($marcas as $marca) { ?>
        <div class="col-md-4">
            <div class="card mb-3 text-center" style="background-image: url(<?php echo $marca->marcaimg; ?>); background-size: cover; background-position: center; height: 200px; position: relative;">
                <div class="card-body d-flex align-items-center justify-content-center h-100" style="background-color: rgba(0, 0, 0, 0.5);">
                    <h5 class="text-white text-uppercase m-0"><?php echo $marca->marcanome; ?></h5>
                    <input type="hidden" name="setorNome" value="<?php echo $marca->marcanome; ?>">
                    <input type="hidden" name="setorId" value="<?php echo $marca->marcaid; ?>">
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php echo $msgHtml; ?>
</div>
