<?php
$this->layout('master', ['title' => 'Painel administrativo'])
?>

<div class="container">
    <br>
    <h4>Painel administrativo</h4>
    <div class="d-flex align-items-center mb-3">
        <a class="btn btn-danger me-auto" href="javascript:history.back()">Voltar</a>
    </div>
    <div class="m-3">
        <h6>ID de administrador: <?php echo $idAdmin ?></h6>
        <a href="/admin/gerenciarestabelecimento" class="btn btn-success btn-primary">Gerenciar estabelecimentos</a>
        <a href="/admin/gerenciarproduto" class="btn btn-success btn-primary">Gerenciar produtos</a>
        <a href="/admin/gerenciarmarca" class="btn btn-success btn-primary">Gerenciar marcas</a>
    </div>
</div>