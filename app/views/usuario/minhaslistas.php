<?php
$this->layout('master', ['title' => 'Minhas listas']);
?>

<div class="container">
    <h4>Minhas listas</h4>
    <ul>

        <?php foreach ($minhasListas as $lista) {?>
        <li><a class="btn btn-primary"
                href="detalhes/<?php echo $lista->lista_id; ?>"><?php echo $lista->lista_nome; ?></a>
        </li>
        <?php
}
?>

    </ul>
    <a class="btn btn-warning" href="perfil">Voltar</a>
</div>