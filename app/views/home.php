<?php
session_start();
$this->layout('master', ['title' => 'Home']);

?>

<h1>Home - SupportMercado</h1>

<?php if ($_SESSION['logado'] == true) {
    echo "<p>Olá, " . " " . $nome . "</p>
   <a href='usuario/perfil'>Perfil</a>";
} else {?>
    <a href="auth/login">Login</a>
    <a href="auth/cadastrar">Cadastrar</a>
<?php }

if (empty($listarprodutos)) {
    echo ' vazio';
} else {
    foreach ($listarprodutos as $produto) {
        echo '<div>' . $produto['produto'] . ' ' . $produto['marca_nome'] . ' '
            . $produto['medida'] . $produto['unidademedida'];
    }
}

?>

