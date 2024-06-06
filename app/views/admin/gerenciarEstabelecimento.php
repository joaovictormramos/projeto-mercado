<?php
$this->layout('master', ['title' => 'Gerenciar estabelecimento'])

?>

<h1>Gerenciar estabelecimento</h1>

<form action="editarestoque" method="post">
    <table>
        <?php
foreach ($estabelecimentos as $estabelecimento) {?>
                <tr>
                    <td>
                        <?php echo $estabelecimento->estabelecimento_nome; ?>
                    </td>
                    <td>
                        <button value="<?php $estabelecimento->estabelecimento_id;?>">Editar estoque</button>
                    </td>
                </tr>
<?php }
?>
    </table>
</form>