<?php 
include_once "db.php";

class Horario{
    public $id;
    public $horario;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();
    }


    function listar() : array{
        $sql = "select horario from horarios";
        $cmd = $this->pdo->prepare($sql);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}
?>