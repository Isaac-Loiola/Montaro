<?php 
include "class/produto.php";

    $produto = new Produto();
    $produtos = $produto->listar(1); // Retorna apenas os produtos em destaque / vazio - retorna todos
    $linhas = count($produtos);
?>

<section>

<?php  if($linhas == 0 ){ ?>
        <h2 class="pt-5" id="products">
            Não Há Produtos em Destaque
        </h2>
<?php }?>

<?php if($linhas > 0) {?>

        <h2 class="pt-5" id="#destaques">
            Produtos em Destaque
        </h2>
        
        <div class="d-flex flex-wrap gap-lg-5 gap-sm-3 gap-md justify-content-center">
            <?php foreach ($produtos as $prod) :?>
            <div class="card-container col-lg-3 col-sm-6 col-md-4 mb-4 shadow-sm">
                <div class="card box-shadow-sm ">
                    <img src="../images/products/<?= $prod['imagem']?>" 
                        alt="<?= $prod['descricao']?>" 
                        class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title">
                            <?= $prod['descricao']?>
                        </h3>

                        <h6 class="card-text">
                            <?= $prod['rotulo']?>
                        </h6>

                        <p class="card-text">
                            <?= mb_strimwidth( $prod['resumo'], 0, 100, '...' )?>
                        </p>
                        <p class="card-text">
                            <?="R$ ".number_format($prod['valor'], 2, ',', '.')?>
                        </p>
                        <a href="#detalhes_produto.php" class="btn btn-dark">
                            <span class="d-none d-sm-inline">Saiba Mais</span> &nbsp;
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
            </div> <!-- final card -->
            <?php endforeach; ?>
        </div> <!-- final row -->
        
        <?php }?>    
</section>