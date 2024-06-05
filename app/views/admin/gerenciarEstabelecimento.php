<?php
$this->layout('master', ['title' => 'Gerenciamento']);
?>

<h1>Gerenciamento</h1>

<table>
<?php
foreach ($estabelecimentos as $estabelecimento) {?>
    <tr>
        <td>
            <h4> <?php echo $estabelecimento->estabelecimento_nome; ?> </h4>
        </td>
        <td>
        <form action="/admin/editarestoque" method="post">
            <button value="<?php echo $estabelecimento->estabelecimento_id; ?>">Editar estoque</a>
        </form>
        </td>
        <td>
            <a href="">Editar registro</a>
        </td>
    </tr>
<?php
}
?>
</table>

<a href="/admin/cadastrarestabelecimento">Cadastrar novo estabelecimento</a>

<a href="/admin">Voltar</a>
