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
        $cmd->bindValue(':sigla', $sigla);
        $cmd->bindValue(':nome', $nome);
        return $cmd->execute();
    }

    function obterPorId(string $idNivel): array{
        $sql = "select * from niveis where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(':id', $idNivel);
        $cmd->execute();

        return $cmd->fetch();
    }

    function obterLista() : array{
        $sql = "select * from niveis";
        $cmd = $this->pdo->query($sql);

        return $cmd->fetchAll();
    }

    function atualizar(){
        $sql = "update niveis set sigla = :sigla, nome = :nome";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(':sigla', $this->sigla);
        $cmd->bindValue(':nome', $this->nome);
        $cmd->execute();
    }
}

?>