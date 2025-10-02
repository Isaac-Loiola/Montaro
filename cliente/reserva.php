<?php 
    if($_POST){
        $message = "Olá Isaac tudo bem ? Você realizou uma reserva na montaro";
        mail('isaacoliveirakopi@gmail.com', 'Reserva Montaro' , $message);
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
<body>
    <header class="mb-5">
        
    </header>
    <main class="container py-5 d-flex justify-content-center align-items-center">
        <div class="card-reserva shadow-lg col-10 col-lg-6 mt-5 p-5">
            <h2>Reservar</h2>
            <p>Realize a sua reserva agora mesmo!</p>
            <form action="reserva.php" method="post" class="inputs d-flex flex-column gap-5">
                <div class="input-group  d-flex flex-column">
                        <label>
                            Numero de pessoas:
                        </label>
                        <select name="quantidadePessoas" id="quantidadePessoas" required>
                            <option value="1" default>1 Pessoa</option>
                            <option value="2">2 Pessoas</option>
                            <option value="3">3 Pessoas</option>
                            <option value="4">4 Pessoas</option>
                            <option value="5">5 Pessoas</option>
                            <option value="6">6 Pessoas</option>
                        </select>
                    </div>
                    <div class="input-group  d-flex flex-column">
                        <label>
                            Data:
                        </label>
                        <input type="date" name="data" id="data">
                    </div>
                    <div class="input-group  d-flex flex-column">
                        <label>
                            Hora:
                        </label>
                        <select name="hora" id="hora" required>
                            <option value="12:30" default>12:30</option>
                        </select>
                    </div>
                    <div class="input-group ">
                        <button type="submit" name="reserva" id="reserva" class="btn btn-dark">
                            Finalizar
                        </button>
                    </div>
                </form>
        </div>
    </main>
</body>
</html>