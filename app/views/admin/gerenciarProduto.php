<?php
$this->layout('master', ['title' => 'Gerenciar produtos']);
?>

<div class="container">
    <br>
    <h4>Setores</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
    </div>
    <div class="d-flex align-items-center mb-3">
        <?php foreach ($setores as $setor) { ?>
        <form action="/admin/editarSetor" method="post">
            <button class="btn btn-lg btn-success m-1" name="setorNome"> <?php echo $setor->setor_nome; ?></button>
            <input type="hidden" name="setorNome" value="<?php echo $setor->setor_nome; ?>">
            <input type="hidden" name="setorId" value="<?php echo $setor->setor_id; ?>">
        </form>
        <?php } ?>
    </div>
</div>