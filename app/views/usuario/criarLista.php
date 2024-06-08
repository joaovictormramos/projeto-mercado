<?php
session_start();
$this->layout('master', ['title' => 'Criar lista']);

?>
<h1>SupportMercado</h1>
<h4>Página Criar lista</h4>

<form action="" method="post">
    <label for="listaNome">Nome da lista</label>
    <input type="text">
    <label for="data">Agendar lista</label>
    <input type="date" name="data" id="">
</form>
<a href="perfil">Voltar</a>

<form action="testecadastro" method="post">
<table>
<?php
foreach ($produtos as $produto) {?>
    <tr>
        <td>
            <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string)$produto->produto_medida) . $produto->produto_unidademedida; ?>
            <input type="number" name="qtdProduto" value=" <?php echo $produto->produto_id ?> ">
        </td>
    </tr>
<?php
}
?>
</table>
<button>Criar lista</button>
</form>
