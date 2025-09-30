<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <?php include "menu_publico.php"?>
    </header>
    <main class="container py-5 d-flex justify-content-center align-items-center">
        <div class="card-login shadow-lg col-10 col-lg-4 mt-5 p-5">
            <h2>Cadastro</h2>
            <p>Realize o seu cadastro para ter um visão geral</p>
                <form action="cadastroUsuario.php" method="post" class="inputs d-flex flex-column gap-5">
                    <div class="input-group">
                        <input type="text" name="nome" id="nome" placeholder="Nome" maxlength="50" class="input-text">
                    </div>
                    <div class="input-group">
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" maxlength="11" class="input-text">
                    </div>
                    <div class="input-group">
                        <input type="mail" name="email" id="email" placeholder="Email"  maxlength="90" class="input-text">
                    </div>
                    <div class="input-group">
                        <input type="text" name="telefone" id="telefone" placeholder="Telefone" maxlength="11" class="input-text">
                    </div>
                    <div class="input-group">
                        <input type="text" name="senha" id="senha" placeholder="Senha" class="input-text">
                    </div>
                    <div class="input-group">
                        <button type="submit" name="cadastro" id="cadastro" class="btn btn-dark">
                            Cadastrar
                        </button>
                    </div>
                </form>
        </div>
    </main>
</body>
</html> 