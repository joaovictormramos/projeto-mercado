<?php
session_start();
$this->layout('master', ['title' => 'Home - SupportMercado']);

?>

<h1>Home - SupportMercado</h1>
<h4>Página incial</h4>

<?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    echo "<p>Olá, " . $nome . "</p>
   <a href='usuario/perfil'>Perfil</a>";
} else {
    echo '<a href="auth/login">Login</a>' . ' ' . '<a href="auth/cadastrar">Cadastrar</a>';
}

if (empty($listaprodutos)) {
    echo ' vazio';
} else {
    foreach ($listaprodutos as $produto) {
        echo '<div>' . $produto->produto_produto . ' ' . $produto->marca_nome . ' '
        . $produto->produto_medida . $produto->produto_unidademedida;
    }
}
?>

