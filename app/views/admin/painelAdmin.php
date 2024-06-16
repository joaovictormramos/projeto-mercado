<?php
$this->layout('master', ['title' => 'Painel administrativo'])
?>

<div class="container">
    <h4>Painel administrativo</h4>
    <h6>ID de administrador: <?php echo $idAdmin ?></h6>
    <a href="/admin/gerenciarestabelecimento" class="btn btn-success btn-primary">Gerenciar estabelecimentos</a>
    <a href="/admin/gerenciarproduto" class="btn btn-success btn-primary">Gerenciar produtos</a>
</div>