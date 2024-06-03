<?php
$this->layout('master', ['title' => 'Cadastrar estabelecimento']);
?>

<h1>Estabelecimentos</h1>
<h4>Página de cadastrar estabelecimento</h4>

<form action="cadastrarestabelecimento" method="post">
    <label for="estabelecimentonome">Nome do estabelecimento</label>
    <input type="text" name="estabelecimentonome" required>

    <label for="endereco">Endereço</label>
    <input type="text" name="endereco" required>

    <button>Cadastrar</button>
</form>

<a href="../admin">Voltar</a>