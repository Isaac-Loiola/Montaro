<?php 

// 1 - Definir nome da sessão 
session_name('montaro');
session_start();



// 2 - Segurança: verificar se a sessão é valida

if(!isset($_SESSION['login_usuario'])){

    header('location:login.php');
    exit;
}

$_SESSION['nome_da_sessao'] = "troquei_memu";



// 3 - Verifica se o nome da sessão corresponde a sessão atual 

if(!isset($_SESSION['nome_da_sessao'])){
    
    $_SESSION['nome_da_sessao'] = session_name();

}else if($_SESSION['nome_da_sessao'] !== session_name()){
    session_destroy();
    header('location:login.php');
    exit;
}

// 4 - Segurança Extra: valida o agente (usuário) e o IP


// 5 - Se IP ou navegador mudaram, invalida a sessão!



?>