<?php 
include_once "../class/reserva.php";
include_once "../class/horario.php";

    $reserva = new Reserva();
    $horariosDefinidos = new Horario();

    // array para comparação, pegando todos horarios registrados
    $horarios = $horariosDefinidos->listar();
    
    // array para comparação
    $horariosReservas = $reserva->obterHorariosPorData($_GET['data']);


    // array para definir retornar ao js horarios que estão disponiveis
    $horariosDisponiveis = $horariosDefinidos->listar();

    foreach($horariosReservas as $horario){
        for($i = 0; $i <= count($horarios);$i ++){
            if((string)$horario['id_horario'] == (string)$horarios[$i]['id']){
                unset($horariosDisponiveis[$i]);
                break;
            }
        }
    }

    $json = json_encode(array_values($horariosDisponiveis));

    echo $json; 
?>