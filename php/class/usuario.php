<?php

use function PHPSTORM_META\sql_injection_subst;

include_once "db.php";

// POO com PHP 
class Usuario{

    // Atributos
    private $id;
    private $login;
    private $senha;
    private $nivel;

    private $pdo;

    public function __construct(){
        $this->pdo = getConnection();
    }

    //Getters e Setters - Propriedades ou métodos de acesso!
    public function getId(){
        return $this->id; // o banco é quem atribui 
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getNivel(){
        return $this->nivel;
    }

    public function setNivel($nivel){
        $this->nivel = $nivel;
    }

    // inserindo usuario
    public function inserir() : bool {
        $sql = "insert into usuarios (login, senha, nivel)
        values (:login, md5(:senha), :nivel)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login);
        $cmd->bindValue(":senha", $this->senha);
        $cmd->bindValue(":nivel", $this->nivel);
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
            $this->login = $dados['login'];
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];

            return true;
        }
        return false;
    }

    public function efetuarLogin(string $loginInformado, string $senhaInformada) : array{
        $sql = "select * from usuarios where login = :login and senha = md5(:senha)";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $loginInformado);
        $cmd->bindValue(":senha", $senhaInformada);
        $cmd->execute();    

        $dados = $cmd->fetch(PDO::FETCH_ASSOC);
        return $dados;       
        
    }

    public function atualizar(int $idUpdate){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "update usuarios set login = :login, nivel = :nivel where id = :id"; 
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":login", $this->login);
        $cmd->bindValue(":nivel", $this->nivel);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    public function alterarSenha($novaSenha, $idUpdate){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "update usuarios set senha = md5(:senha) where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", $novaSenha);
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