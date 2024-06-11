<?php
$this->layout('master', ['title' => 'Criar lista']);
?>

<h1>SupportMercado</h1>
<h4 id="titulo">Página Criar lista</h4>

<a href="perfil">Voltar</a>

<form action="criarlista" method="post">
    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['usuario_id']; ?>">

    <label for="listaNome">Nome da lista</label>
    <input type="text" name="listaNome">

    <label for="data">Agendar lista</label>
    <input type="date" name="data" id="">

<table>
<?php
foreach ($produtos as $produto) {?>
    <tr>
        <td>
            <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; ?>
            <input type="number" name="<?php echo $produto->produto_id; ?>" value="0">
        </td>
    </tr>
<?php
}
?>
</table>
<button>Criar lista</button>
</form>
