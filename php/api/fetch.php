<?php 
include_once "../class/reserva.php";
    $reserva = new Reserva();
    $horarios = $reserva->obterHorariosPorData($_GET['data']);

    $json = json_encode($horarios);

    echo $json; 
?>