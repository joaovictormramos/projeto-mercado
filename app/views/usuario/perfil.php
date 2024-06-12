<?php
$this->layout('master', ['title' => 'Perfil do usuário']);
?>

<div class="container">
    <h1>Bem vindo, <?php echo $nome ?></h1>
    <h4>Página Perfil do usuário</h4>
    <a class="btn btn-primary" href="criarlista">Criar lista</a>
    <a class="btn btn-primary" href="/usuario/minhaslistas">Minhas listas</a>
    <a class="btn btn-primary" href="/">Página inicial</a>
</div>