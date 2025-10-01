<?php 
include_once "db.php";

class Mesa{
    public $id;
    public $numero;
    public $capacidade;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();    
    }

    function inserir() {
        $sql = "insert into mesas values(0, :numero, :capacidade)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":numero", $this->numero);
        $cmd->bindValue(":capacidade", $this->capacidade);
        return $cmd->execute();
    }

    function obterLista() : array{
        $sql = "select * from mesas";
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