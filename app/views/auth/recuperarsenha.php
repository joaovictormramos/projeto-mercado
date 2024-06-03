<?php
$this->layout('master', ['title' => 'Recuperar senha']);
?>

<h1>SupportMercado</h1>
<h4>Recuperar senha</h4>

<form action="/auth/recuperarsenha" method="post">
    <label for="email">Email cadastrado</label>
    <input type="text" name="email" required>
</form>
