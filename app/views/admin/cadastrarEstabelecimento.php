<?php
$this->layout('master', ['title' => 'Cadastrar estabelecimento'])
?>

<div class="container">
<br>
    <h4 class="text-center">Cadastrar estabelecimento</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="">Voltar</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if (isset($msgHtml)) {
                echo $msgHtml;
            }
            ?>
            <form enctype="multipart/form-data" action="/admin/cadastrarEstabelecimento" method="post" class="w-100">
                <div class="mb-1">
                    <div class="mb-3">
                        <label for="estabelecimento" class="form-label">Estabelecimento</label>
                        <input name="estabelecimento" type="text" class="form-control form-control-dark" placeholder="Estabelecimento...">
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereco</label>
                        <input name="endereco" type="text" class="form-control form-control-dark" placeholder="Endereço...">
                    </div>
                </div>
                <button class="btn btn-primary w-100 m-3">Cadastrar estabelecimento</button>
            </form>
        </div>
    </div>
</div>