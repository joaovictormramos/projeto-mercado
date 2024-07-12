<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
    <h1>Estabelecimentos</h1>

<?php
foreach ($estabelecimentos as $estabelecimento) { ?>
<table>
    <tr>
        <form action="/estabelecimento/listarProdutos/" method="post">
            <td>
                    <input name="estabelecimentoID" type="hidden" value="<?php echo $estabelecimento->estabelecimento_id; ?>"> 
                    <input name="estabelecimentoNome" type="hidden" value="<?php echo $estabelecimento->estabelecimento_nome; ?>">
                    <button><?php echo $estabelecimento->estabelecimento_nome;?></button>
            </td>
            <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <img src="<?php echo $estabelecimento->estabelecimento_caminho_img;?>" alt="" width="80px">
            </td>
        </form>
    </tr>
</table>

<?php
}
?>

</div>