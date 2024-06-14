<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
    <h1>Marcas</h1>

<?php
foreach ($marcas as $marca) { ?>
    <a href="/marca/detalhes/<?php echo $marca->marca_id; ?>"> <?php echo $marca->marcanome . $marca->marca_id?> </p>

<?php
}
?>

</div>