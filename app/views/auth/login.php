<?php
$this->layout('master', ['title' => 'Entrar - SupportMercado']);
?>
<br>
<div class="container d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-6 col-lg-4">

        <form class="form-signin" action="/auth/login" method="post">
            <img class="mb-4" src="/assets/images/imagens-aplicacao/icon.ico" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

            <label for="email" class="visually-hidden">Email</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required=""
                autofocus="">

            <label for="senha" class="visually-hidden">Senha</label>
            <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required="">
            
            <br>
            
            <?php if (!is_null($erro)) {
                echo $erro;
            } ?>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar de mim
                </label>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Login</button>
            <a class="btn btn-danger btn-primary" href="/">Retornar</a>
            <a class="btn btn-success btn-primary" href="/auth/cadastrar">Cadastrar</a>
        </form>

    </div>

</div>