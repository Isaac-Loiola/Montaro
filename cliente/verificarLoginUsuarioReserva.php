<?php 
    if(!$_SESSION['login_usuario']){
        header("location: ../admin/login.php");
    }
    else{
        header('location: reserva.php');
    }
?>