<?php 
// require_once "acesso_com.php";
include_once "../php/class/usuario.php";
include_once "../php/class/cliente.php";

if($_POST){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $user = new Usuario();

        $usuarioLogado = $user->efetuarLogin($email, $senha);

        if(count($usuarioLogado) >0 ){
                if(!isset($_SESSION)){
                        session_name('montaro');
                        session_start();
                }
                $_SESSION['email_usuario'] = $usuarioLogado['email'];
                $_SESSION['nivel_usuario'] = $usuarioLogado['nivel'];
                $_SESSION['nome_usuario'] = $usuarioLogado['nome'];
                $_SESSION['id_usuario'] = (int)$usuarioLogado['id'];
                $_SESSION['nome_da_sessao'] = session_name();
                // session_start();
                
                if($usuarioLogado['nivel'] == "adm"){
                        echo "<script>window.open('index.php','_self')</script>";
                }
                else{
                        echo "<script>window.open('../cliente/index.php','_self')</script>";
                }
        }

}

?>


<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="refresh" content="30;url=../php/index.php">
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
        
        <main class="container my-5">
        <section>
        <article>
        <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <h1 class="text-info text-center text-dark mb-4">Faça seu login</h1>
        
                <div class="card shadow-lg">
        <div class="card-body">
        <p class="text-info text-center mb-4" role="alert">
        <i class="bi bi-people-fill display-1 text-dark"></i>
        </p>
        
                    <div class="alert alert-info" role="alert">
        <form action="login.php" name="form_login" id="form_login" method="POST" enctype="multipart/form-data">
        <!-- Login -->
        <div class="mb-3">
        <label for="email" class="form'-label">E-mail:</label>
        <div class="input-group">
        <span class="input-group-text">
        <i class="bi bi-person-fill text-info"></i>
        </span>
        <input type="text" name="email" id="email" 
                class="form-control" 
                placeholder="Digite seu e-mail" 
                autofocus required autocomplete="off">
        </div>
        </div>
        
                        <!-- Senha -->
        <div class="mb-3">
        <label for="senha" class="form-label">Senha:</label>
        <div class="input-group">
        <span class="input-group-text">
        <i class="bi bi-lock-fill text-info"></i>
        </span>
        <input type="password" name="senha" id="senha" 
                class="form-control" 
                placeholder="Digite sua senha" 
                required autocomplete="off">
        </div>
        <a href="../cliente/cadastroUsuario.php" class="text-decoration-none">Cadastre-se</a>
        </div>
        
                        <!-- Botão -->
        <div class="d-grid">
        <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
        </form>
        </div>
        
                    <p class="text-center mt-3">
        <small>
                        Caso não faça uma escolha em 30 segundos será redirecionado automaticamente para página inicial.
        </small>
        </p>
        </div>
        </div>
        </div>
        </div>
        </article>
        </section>
        </main>
</body>
</html>