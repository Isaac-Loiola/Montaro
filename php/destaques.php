<?php 
include "class/produto.php";

$produto = new Produto();
$produtos = $produto->listar(); // Retorna apenas os produtos em destaque / vazio - retorna todos

foreach($produtos as $prod){
    print_r($prod);
    echo "<br>";
}

?>

<section class="products-container mb-5">
            <h2 class="pt-5" id="products">
            Produtos em Destaque
            </h2>

            <div class="d-flex flex-wrap gap-lg-5 gap-sm-3 gap-md justify-content-center">
                <div class="card-container col-lg-3 col-sm-6 col-md-4 mb-4 shadow-sm">
                    <div class="card box-shadow-sm ">
                        <img src="../images/products/chuleta.png" alt="" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title">
                                Chuleta
                            </h3>
                            <p class="card-text">
                                Corte bovino com osso, a chuleta é conhecida pelo sabor forte e pela suculência. Ideal para quem busca uma experiência de churrasco robusta e cheia de personalidade.
                            </p>
                            <a href="#" class="btn btn-dark">
                                <span class="d-none d-sm-inline">Saiba Mais</span> &nbsp;
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
</section>