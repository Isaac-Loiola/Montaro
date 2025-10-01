<?php 
include_once "db.php";

class Reserva{
    public $id;
    public $idCliente;
    public $dataReserva;
    public $horarioReserva;
    public $dataCriacao;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();    
    }

    function inserir() {
        $sql = "insert reservas values(0, :idcliente, :dataReserva, :horarioReserva, default)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":idcliente", $this->idCliente);
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
}

?>