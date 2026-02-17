<?php 

if($_SESSION['nivel_usuario'] == "cli"){
    header('location: ../admin/login.php');
}

?>