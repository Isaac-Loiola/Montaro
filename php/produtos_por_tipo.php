<?php 

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montaro</title>

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <!--  boostrap 5.3 local -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- my css -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- bootstrap javaScript -->
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/bootstrap.bundle.min.js" defer></script>

</head>
<body>
    <!-- header -->
        <!-- area de menu -->
         <?php include 'menu_publico.php'?>
    <!-- header -->

    <main class="container"> 
        <?php 
        if(isset($_GET['tipo_id'])){
            $tipoId = $_GET['tipo_id'];
            include_once "class/produto.php";
    
            $produto = new Produto();
            $produtos = $produto->obterPorTipoId($tipoId); // Retorna apenas os produtos em destaque / vazio - retorna todos
            $linhas = count($produtos);
        }
        ?>

        <section>

        <?php  if($linhas == 0 ){ ?>
                <h2 class="pt-5" id="products">
                    Não Há Produtos Cadastrados
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
                                <a href="detalhes_produto.php?id=<?= $prod['id'] ?>" class="btn btn-dark">
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
    </main>
    <footer>
        <a href="" name="contato" class="produtos text-decoration-none text-white">
            <?php include "rodape.php"?>
        </a>
    </footer>
</body>
</html>