<?php

use function PHPSTORM_META\sql_injection_subst;

include_once "db.php";

// POO com PHP 
class Usuario{

    // Atributos
    private $id;
    private $nome;
    private $email;
    private $datacad;

    private $pdo;

    public function __construct(){
        $this->pdo = getConnection();
    }

    //Getters e Setters - Propriedades ou métodos de acesso!
    public function getId(){
        return $this->id; // o banco é quem atribui 
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getDataCad(){
        return $this->datacad;
    }

    // inserindo usuario
    public function inserir() : bool {
        $sql = "insert into usuarios (nome, email, datacad)
        values (:nome, :email, default)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":email", $this->email);
        $cmd->execute();

        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    public function listar() : array{
        $cmd = $this->pdo->query("select * from usuarios order by id desc");
        return $cmd->fetchAll();
    }

    public function obterPorId(int $id){
        $sql = "select * from usuarios where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        if($cmd->rowCount() > 0 ){
            $dados = $cmd->fetch();

            $this->id = $dados['id'];
            $this->nome = $dados['nome'];
            $this->email = $dados['email'];
            $this->datacad = $dados['datacad'];

            return true;
        }
        return false;
    }

    public function atualizar(int $idUpdate){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "update usuarios set nome = :nome, email = :email where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    public function excluir(int $idDelete){
        $id = $idDelete;
        if(!$this->id) return false;

        $sql = "delete from usuarios where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}


?>