<?php 
    include "class/produto.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $produto = new Produto();
        $prod = $produto->obterPorId($id);
    }
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Montaro</title>

    <!--  icons -->
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
    <header>
        <?php include 'menu_publico.php'?>
    </header>

    <main class="container d-flex flex-column"> 
        <h2 class="pt-5 mb-5">
            <a href="index.php" class="text-decoration-none text-dark ">
                <i class="bi bi-caret-left-fill mb-5"></i>
                Detalhes do Produto - <?= $prod['descricao']; ?>
            </a>
        </h2>
        <div class="d-flex justify-content-center mb-5">
                <div class="card box-shadow-sm col-6">
                    <img src="../images/products/<?= $prod['imagem']?>" 
                        alt="<?= $prod['descricao']?>" 
                        class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title text-center">
                            <?= $prod['descricao']?>
                        </h3>

                        <h6 class="card-text text-center">
                            <?= $prod['rotulo']?>
                        </h6>

                        <p class="card-text">
                            <?= $prod['resumo']?>
                        </p>
                        <div class="d-flex gap-3 align-self-center">
                            <?="R$ ".number_format($prod['valor'], 2, ',', '.')?>
                            <a href="detalhes_produto.php?id=<?= $prod['id'] ?>" class="btn btn-dark">
                                <span class="d-none d-sm-inline">Adquirir</span> &nbsp;
                            </a>
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <footer>
        <a href="" name="contato" class="produtos text-decoration-none text-white">
            <?php include "rodape.php"?>
        </a>
    </footer>
</body>
</html>