<?php 

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
    <!-- header -->
        <!-- area de menu -->
         <?php include 'menu_apresentacao.php'?>
    <!-- header -->

    <main class="container"> 
        <?php include "historia.php"?>

        <?php include "destaques.php"?>
    </main>
</body>
</html>