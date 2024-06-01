<?php
session_start();
$this->layout('master', ['title' => 'Home']);

?>

<h1>Home - SupportMercado</h1>
<h4>Página incial</h4>

<?php if ($_SESSION['logado'] == true) {
    echo "<p>Olá, " . $nome . "</p>
   <a href='usuario/perfil'>Perfil</a>";
} else {
    echo '<a href="auth/login">Login</a>' . ' ' . '<a href="auth/cadastrar">Cadastrar</a>';
}

if (empty($listaprodutos)) {
    echo ' vazio';
} else {
    foreach ($listaprodutos as $produto) {
        echo '<div>' . $produto['produto'] . ' ' . $produto['marca_nome'] . ' '
            . $produto['medida'] . $produto['unidademedida'];
    }
}
?>

