<?php 

include_once "db.php";

class Nivel{
    private $id;
    private $sigla;
    private $nome;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();
    }

    function inserir(string $sigla, string $nome):bool{
        $sql = "insert into niveis(sigla, nome) values (:sigla, :nome)";
        $cmd = $this->pdo->prepare($sql);
        return $cmd->execute([
            ':sigla' => $sigla,
            ':nome' => $nome
        ]);
    }
}

?>