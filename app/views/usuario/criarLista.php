<?php
$this->layout('master', ['title' => 'Criar lista']);
?>

<div class="container">
    <form action="" method="post">
        <br>
        <div class="row">
            <div class="col text-start">
                <label for="listName">Nome da lista</label>
                <input type="text" name="listName" placeholder="Nome da lista">
            </div>
            <div class="col text-end">
                <label for="appointmentDay">Agendar</label>
                <input type="date" name="appointmentDay" id="">
            </div>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col text-start">
                <form action="">
                    <input type="text" placeholder="Buscar produto ou marca...">
                </form>
            </div>
        </div>
        <?php foreach ($produtosEstabelecimento as $setor => $produtos) {?>
        <br>
        <br>
        <h3 class="text-start"><?php echo $setor; ?></h3>
        <div id="carousel-<?php echo $setor; ?>" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
$chunks = array_chunk($produtos, 4); // Dividir os produtos em grupos de 4 para cada slide
    foreach ($chunks as $index => $chunk) {
        $activeClass = $index === 0 ? 'active' : '';
        ?>
                <div class="carousel-item <?php echo $activeClass; ?>">
                    <div class="row justify-content-center">
                        <?php foreach ($chunk as $produto) {?>
                        <div class="col-md-3">
                            <!-- Alterado para col-md-3 -->
                            <div class="card mb-4 shadow-sm">
                                <img class="card-img-top custom-card-img"
                                    src="<?php echo $produto->produto_caminho_img; ?>" alt="Thumbnail [100%x225]"
                                    style="height: 150px;  object-fit: contain;">
                                <div class="card-body">
                                    <p class="card-text">
                                        <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary">Adicionar</button>
                                            <button type="button"
                                                class="btn btn-sm btn-outline-secondary">Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php
}?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $setor; ?>"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $setor; ?>"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php }?>
    </form>
</div>