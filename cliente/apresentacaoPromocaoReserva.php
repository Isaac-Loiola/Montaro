<?php 
if(isset($_SESSION)){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
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
<body class="d-flex flex-column gap-5">
    <header class="py-2">
        <?php include "../php/menu_publico.php"?>
    </header>
    <main class="py-5 container ">
        <div class="d-flex flex-column mt-5">
            <h1>
                Promoção para Novos Clientes
            </h1>
            <p class="paragraph col-10 col-sm-7 mb-5">
                Se você ainda não fez sua primeira reserva conosco, essa é a sua chance de começar com vantagem. Estamos oferecendo um desconto exclusivo para novos clientes que realizarem sua primeira reserva. É uma forma de dar boas-vindas e mostrar que aqui você é valorizado desde o primeiro contato. <br> <br> Na sua primeira reserva, você garante 10% de desconto em cada bebida da comanda, ainda ganha uma sobremesa especial como cortesia. É a nossa forma de te dar boas-vindas e tornar sua primeira experiência ainda mais saborosa.
                Para participar, basta preencher o cadastro e realizar sua primeira reserva. Aproveite!
            </p>
            <h2>
                Regras
            </h2>
            <p class="paragraph col-10 col-sm-7">
                Para garantir uma experiência organizada e justa para todos os participantes da promoção, é importante seguir algumas regras simples no momento de realizar sua reserva.
                As reservas devem ser feitas com no mínimo 48 horas de antecedência e no máximo 90 dias antes da data desejada. Cada cliente pode realizar apenas um pedido de reserva por dia, utilizando o mesmo CPF.
                No momento da solicitação, é obrigatório informar o nome completo, o CPF e o e-mail. Essas informações são essenciais para validar sua participação na promoção e garantir o desconto exclusivo para novos clientes.
                Ao seguir essas orientações, você garante que sua reserva será processada corretamente e que poderá aproveitar todos os benefícios da promoção.
            </p>

            <a href="verificarLoginUsuarioReserva.php" class="btn btn-dark col-2">
                Reservar Agora!
            </a>
        </div>
    </main>
</body>
</html>