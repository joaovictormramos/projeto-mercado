<?php
session_start();
$this->layout('master', ['title' => 'Perfil do usuário']);

?>
<h1>Bem vindo, <?php echo $nome ?></h1>
<h4>Página Perfil do usuário</h4>

<form action="../auth/logout" method="get">
    <button>Sair</button>
</form>
<a href="/usuario/minhaslistas">Minhas listas</a>
    <a href="/">Página inicial</a>
