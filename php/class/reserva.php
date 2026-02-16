<?php 
include_once "db.php";

class Reserva{
    public $id;
    public $idCliente;
    public $quantidade;
    public $dataReserva;
    public $horarioReserva;
    public $dataCriacao;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();    
    }

    function inserir() {
        $sql = "insert reservas values(0, :idcliente, :dataReserva, :horarioReserva, :quantidade, default)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":idcliente", $this->idCliente);
        $cmd->bindvalue(":quantidade", $this->quantidade);
        $cmd->bindValue(":dataReserva", $this->dataReserva);
        $cmd->bindValue(":horarioReserva", $this->horarioReserva);
        return $cmd->execute();
    }

    function obterLista() : array{
        $sql = "select * from reservas";
        $cmd = $this->pdo->prepare($sql);
        $cmd->execute();
        $dados = $cmd->fetchAll();
        if($dados == false){
            return $dados = [];
        }
        return $dados;
    }

    function obterHorariosPorData($data) : array{
        $sql = "select id_horario from reservas where data_reserva = '$data'";
        $cmd = $this->pdo->prepare($sql);
        $cmd->execute();
        $horarios = $cmd->fetchAll(PDO::FETCH_ASSOC);
        if(!$horarios){
            $horarios = [];
        }
        return $horarios;
    }
}
?>