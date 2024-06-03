<?php
$this->layout('master', ['title' => 'Produtos - SupportMercado']);
?>

<h1>Produtos</h1>
<h4>Página de cadastrar produto</h4>

<form action="cadastrarproduto" method="post">

    <label for="produto">Produto</label>
    <input type="text" name="produto" required>

    <label for="marcaId">Marca</label>
    <select name="marcaId" id="" required>
        <option value=""></option>
        <?php foreach ($marcas as $marca): ?>
            <option value="<?php echo $marca->marcaid; ?>"><?php echo $marca->marcanome; ?></option>
        <?php endforeach;?>
    </select>

    <label for="medida">medida</label>
    <input type="number" name="medida" id="medida" step="0.1" required>

    <label for="unidadeMedida">Unidade de medida</label>
    <select name="unidadeMedida" id="unidadeMedida" required>
        <option value=""></option>
        <option value="Kg">Kg</option>
        <option value="g">g</option>
        <option value="L">L</option>
        <option value="mL">mL</option>
        <option value="unid">unid</option>
    </select>
    <button>Cadastrar</button>
</form>
<a href="../admin">Voltar</a>

<?php
