<?php
$this->layout('master', ['title' => 'Minhas listas']);
?>

<div class="container">

    <h1>SupportMercado</h1>
    <h4>Minhas listas</h4>

    <?php foreach ($minhasListas as $lista) {?>
    <a class="btn btn-primary" href="detalhes/<?php echo $lista->lista_id; ?>"><?php echo $lista->lista_nome; ?></a>
    <?php
}
?>
    <a class="btn btn-warning" href="perfil">Voltar</a>
</div>