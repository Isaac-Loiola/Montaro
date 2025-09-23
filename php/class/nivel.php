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

    function obterPorId(string $idNivel): array{
        $sql = "select * from niveis where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->execute([
            ':id' => $idNivel
        ]);

        return $cmd->fetch();
    }
}

?>