<?php
$this->layout('master', ['title' => 'Cadastrar estabelecimento']);
?>

<h1>Estabelecimentos</h1>
<h4>Página de cadastrar estabelecimento</h4>

<form action="admin/cadastrarestabelecimento" method="post">
    <label for="estabelecimentonome">Estabelecimento</label>
    <input type="text" name="estabelecimentonome" required>

    <label for="estabelecimentoendereco">Endereço</label>
    <input type="text" name="estabelecimentoendereco" required>

    <button>Cadastrar</button>
</form>

<a href="gerenciarestabelecimento">Voltar</a>
