<?php 
    include "class/produto.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $produto = new Produto();
        $produto = $produto->obterPorId($id);
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

    <main class="container"> 
        <h2 class="pt-5">
            <a href="index.php" class="text-decoration-none text-dark">
                <i class="bi bi-caret-left-fill"></i>
                Detalhes do Produto
                <?= $produto->getDescricao(); ?>
            </a>
        </h2>
    </main>
</body>
</html>