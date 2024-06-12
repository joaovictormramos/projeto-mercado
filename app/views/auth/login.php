<?php
$this->layout('master', ['title' => 'Entrar - SupportMercado'])
?>

<div class="container">
    <h1>Login</h1>
    <h4>Página de login</h4>

    <form action="/auth/login" method="post">

        <label for="email">Email</label>
        <input type="text" name="email">

        <label for="senha">Senha</label>
        <input type="password" name="senha">

        <button>Entrar</button>

    </form>
    <a href="/">Retornar</a>
</div>