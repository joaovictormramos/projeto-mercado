<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
    <h1>Estabelecimentos</h1>

<?php
foreach ($estabelecimentos as $estabelecimento) { ?>
<table>
    <tr>
        <td>
            <p> <?php echo $estabelecimento->estabelecimento_nome;?> </p>
        </td>
        <td>
            <img src="<?php echo $estabelecimento->estabelecimento_caminho_img;?>" alt="" width="80px">
        </td>
    </tr>
</table>

<?php
}
?>

</div>