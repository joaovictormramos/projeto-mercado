<?php
$this->layout('master', ['title' => 'Home - SupportMercado']);
?>

<div class="container">
    <h4>Página incial</h4>

    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    echo "<p>Olá, " . $nome . "</p>";
} else {
    echo '<a href="auth/login">Login</a>' . ' ' . '<a href="auth/cadastrar">Cadastrar</a>';
}
?>

<table class="table">
  <tbody>
    <tr>
      <th scope="row">Mercearia</th>
      <td></td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">Bebida</th>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <th scope="row">Limpeza</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">Laticínios</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<?php
foreach ($produtos as $produto) {
    echo '<div>' . $produto->produto_produto . ' ' . $produto->marca_nome . ' '
    . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida;
}
?>
</table>
