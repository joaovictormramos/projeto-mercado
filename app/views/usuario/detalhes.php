<?php
$this->layout('master', ['title' => 'Detalhes lista']);
$lista_nome = $listaDesc[0]->lista_nome;
?>

<div class="container">
    <h2><?php echo $lista_nome; ?></h2>

    <table>
        <?php
foreach ($listaDesc as $produto) {?>
        <tr>
            <td>
                <p>
                    <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; ?>
                </p>
            </td>
            <td>
                <p>
                    <?php echo $produto->lista_produto_qtd; ?>
                </p>
            </td>
        </tr>
        <?php
}
?>
    </table>

    <a href="../minhaslistas">Retornar</a>
</div>