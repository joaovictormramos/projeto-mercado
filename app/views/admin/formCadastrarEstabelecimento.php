<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<h1>Estabelecimentos</h1>
<h4>Página de cadastrar estabelecimento</h4>

<form action="cadastrarestabelecimento" method="post">
    <label for="estabelecimento">Nome do estabelecimento</label>
    <input type="text" name="estabelecimento">
    <button>Cadastrar</button>
</form>

<a href="../admin">Voltar</a>