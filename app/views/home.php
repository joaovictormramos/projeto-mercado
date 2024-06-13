<?php
$this->layout('master', ['title' => 'Home - SupportMercado']);
?>

<div class="container">

  <?php foreach ($produtosPorSetor as $setorNome => $produtos) { ?>
  <h3 class="text-start"><?php echo $setorNome; ?></h3>
  <div id="carousel-<?php echo $setorNome; ?>" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
                $chunks = array_chunk($produtos, 4); // Dividir os produtos em grupos de 3 para cada slide
                foreach ($chunks as $index => $chunk) {
                    $activeClass = $index === 0 ? 'active' : '';
                ?>
      <div class="carousel-item <?php echo $activeClass; ?>">
        <div class="row justify-content-center">
          <?php foreach ($chunk as $produto) { ?>
          <div class="col-md-3">
            <!-- Alterado para col-md-3 -->
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top custom-card-img" src="<?php echo $produto->produto_caminho_img; ?>"
                alt="Thumbnail [100%x225]" style="height: 150px;  object-fit: contain;">
              <div class="card-body">
                <p class="card-text">
                  <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string)$produto->produto_medida) . $produto->produto_unidademedida; ?>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Adicionar</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $setorNome; ?>"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $setorNome; ?>"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <?php } ?>
</div>