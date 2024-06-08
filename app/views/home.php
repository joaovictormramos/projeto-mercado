<?php
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

if (empty($produtos)) {
    echo ' vazio';
} else {
    foreach ($produtos as $produto) {
        echo '<div>' . $produto->produto_produto . ' ' . $produto->marca_nome . ' '
        .  str_replace('.', ',', (string)$produto->produto_medida) . $produto->produto_unidademedida;
    }
}
?>

