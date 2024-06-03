<?php
session_start();
$this->layout('master', ['title' => 'Criar lista']);

?>
<h1>SupportMercado</h1>
<h4>Página Criar lista</h4>

<form action="" method="post">
    <label for="listaNome">Nome da lista</label>
    <input type="text">
</form>
<a href="perfil">Voltar</a>

