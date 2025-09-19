<?php 
    session_name("montaro");
    session_start();
?>

<h1>Area de Cliente</h1>
<h2>
    Área exclusiva de <?= $_SESSION['login_usuario']?>
</h2