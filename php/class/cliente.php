<?php 
include "db.php";

class Cliente{
    public $id;
    public $nome;
    public $cpf;
    public $email;
    public $telefone;
    public $senha;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();    
    }

    function inserir() : bool{
        $sql = "insert into clientes values(0, :nome, :cpf, :email, :telefone, :senha)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":cpf", $this->cpf);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":telefone", $this->telefone);
        $cmd->bindValue(":senha", $this->senha);
        return $cmd->execute();
    }

}

?>