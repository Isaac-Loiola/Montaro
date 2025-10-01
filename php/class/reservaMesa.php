<?php 
include_once "db.php";

class Mesa{
    public $idMesa;
    public $idReserva;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();    
    }

    function inserir() {
        $sql = "insert reserva_mesa";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":numero", $this->idMesa);
        $cmd->bindValue(":capacidade", $this->idReserva);
        return $cmd->execute();
    }

    function obterLista() : array{
        $sql = "select * from reserva_mesa";
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