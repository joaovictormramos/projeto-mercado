<?php
$this->layout('master', ['title' => 'Gerenciar estabelecimento'])
?>

<div class="container">
    <br>
    <h4>Gerenciar estabelecimento</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
        <form class="form ms-auto" action="/admin/cadastrarestabelecimento" method="get">
            <button class="btn btn-primary ms-auto">Cadastrar estabelecimento</button>
        </form>
    </div>
    <table>
        <?php
foreach ($estabelecimentos as $estabelecimento) {?>
        <tr>
            <td>
                <?php echo $estabelecimento->estabelecimento_nome; ?>
            </td>
            <td>
                <form action="/admin/editarestoque/" method="post">
                    <button class="btn btn-success" name="idEstabelecimento" value="<?php echo $estabelecimento->estabelecimento_id;?>">Editar
                        estoque</button>
                    <input type="hidden" name="estabelecimento"
                        value="<?php echo $estabelecimento->estabelecimento_nome; ?>">
                </form>
            </td>
        </tr>
        <?php }?>
    </table>
</div>