<?php 
include_once "db.php";

class Horario{
    public $id;
    public $horario;
    public $disponivel;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();    
    }

    function inserir() : bool{
        $sql = "insert into horarios values(0, :horario , 1)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":horario", $this->horario);
        return $cmd->execute();
    }

    function obterDisponiveis() : array{
        $sql = "select * from horarios where disponivel = 1";
        $cmd = $this->pdo->prepare($sql);
        $cmd->execute();
        $horarios = $cmd->fetchAll();
        if($horarios == false){
            return $horarios = [];
        }
        return $horarios;
    }
}

?>