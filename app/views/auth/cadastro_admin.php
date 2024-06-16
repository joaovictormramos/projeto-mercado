<?php
$this->layout('master', ['title' => 'Produto']);
?>

<form action="/auth/cadastrarAdmin" method="POST">
    <div class="form-row">
        <input type="hidden" name="is_admin" value="true">

        <div class="form-group col-md-6">
            <label for="nome">Nome</label>
            <input name="nome" type="text" class="form-control" id="" placeholder="Nome">
        </div>

        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="" placeholder="Email">
        </div>

        <div class="form-group col-md-6">
            <label for="cpf">CPF</label>
            <input name="cpf" type="number" class="form-control" id="inputEmail4" placeholder="CPF">
        </div>

        <div class="form-group col-md-6">
            <label for="senha">Senha</label>
            <input name="senha" type="password" class="form-control" id="inputPassword4" placeholder="Senha">
        </div>

        <div class="form-group col-md-6">
            <label for="confirmarSenha">Confirmar senha</label>
            <input name="confirmarSenha" type="password" class="form-control" id="inputPassword4" placeholder="Senha">
        </div>
        <br>
        <?php echo $erro ?>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>