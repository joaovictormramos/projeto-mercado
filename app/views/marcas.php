<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<div class="container">
    <h1>Marcas</h1>

<?php
foreach ($marcas as $marca) { ?>
    <p> <?php echo $marca->marcanome;?> </p>

<?php
}
?>

</div>