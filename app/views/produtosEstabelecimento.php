<?php
$this->layout('master', ['title' => $estabelecimentoNome]);
?>
<div class="container">


<?php foreach ($setores as $setor) { ?>
    <h3><?php echo $setor->setor_nome; ?></h3>
<?php 
    foreach ($produtos as $produto) {
        if ($produto->setor_nome == $setor->setor_nome) { ?>
            <div class="card mb-4 shadow-sm">
              <img class="card-img-top custom-card-img" src="<?php echo $produto->produto_caminho_img; ?>"
                alt="Thumbnail [100%x225]" style="height: 150px;  object-fit: contain;">
              <div class="card-body">
                <p class="card-text">
                  <?php echo $produto->produto_produto . ' ' . $produto->marca_nome . ' ' . str_replace('.', ',', (string) $produto->produto_medida) . $produto->produto_unidademedida; ?>
                </p>
                <h4>R$ <?php echo number_format($produto->estabelecimento_produto_preco, 2, ','); ?></h4>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Adicionar</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                  </div>
                </div>
              </div>
            </div>
<?php   }
    }
}?>
    


</div>