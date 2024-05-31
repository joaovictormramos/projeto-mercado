<?php
session_start();
$this->layout('master', ['title' => 'Perfil do usuário']);

?>
<h1>Bem vindo, <?php echo $nome ?></h1>
<form action="../auth/logout" method="get">
    <button>Sair</button>
</form>
    <a href="/">Página inicial</a>
