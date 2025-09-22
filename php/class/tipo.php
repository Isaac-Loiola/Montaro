<?php 
include "db.php";

class Tipo{
    // Atributos!
    private $id;
    private $sigla;
    private $rotulo;

    private $pdo;

    function __construct()
    {
        $this->pdo = getConnection();
    }

    // Função para inserir um tipo ao banco de dados.
    function inserir(string $sigla, string $rotulo) : bool {
        $sql = "insert into tipos (sigla, rotulo) values (:sigla, :rotulo)";
        $cmd = $this->pdo->prepare($sql);
        return $cmd->execute([
            ':sigla' => $sigla,
            ':rotulo' => $rotulo
        ]);
    }

    function obterLista() : array{  
        $sql = "select * from tipos";
        $cmd = $this->pdo->query($sql);
        return $cmd->fetchAll();
    }
}
?>