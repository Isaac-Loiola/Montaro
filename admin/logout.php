<?php 
session_name('montaro');
session_start();
session_destroy(); // Obriga o usuario a fazer login

header('location: ../php/index.php');

exit;
?>