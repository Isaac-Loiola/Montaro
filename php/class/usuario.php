<?php

use function PHPSTORM_META\sql_injection_subst;

include_once "db.php";

// POO com PHP 
class Usuario{

    // Atributos
    public $id;
    public $senha;
    public $nivel;
    public $nome;
    public $email;
    public $cpf;

    public $pdo;

    public function __construct(){
        $this->pdo = getConnection();
    }

    //Getters e Setters - Propriedades ou métodos de acesso!
    public function getId(){
        return $this->id; // o banco é quem atribui 
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
        $sql = "insert into usuarios
        values (0, :senha, :nivel, :nome, :email, :cpf)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":senha", password_hash($this->senha, PASSWORD_DEFAULT));
        $cmd->bindValue(":nivel", $this->nivel);
        $cmd->bindValue(":nome", $this->nome);
        $cmd->bindValue(":email", $this->email);
        $cmd->bindValue(":cpf", $this->cpf);
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
            $this->senha = $dados['senha'];
            $this->nivel = $dados['nivel'];
            $this->nome = $dados['nome'];
            $this->email = $dados['email'];
            $this->cpf = $dados['cpf'];

            return true;
        }
        return false;
    }

    public function efetuarLogin(string $emailInformado, string $senhaInformada) : array{
        $sql = "select * from usuarios where email = :email limit 1";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(':email', $emailInformado);
        $cmd->execute();
        $user = $cmd->fetch(PDO::FETCH_ASSOC);
        if($user){
            if(password_verify($senhaInformada, $user['senha'])){
                $user['senha'] = "";
                return $user;
            }
        }
        $user = [];
        return $user;
    }

    public function atualizar(int $idUpdate){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "update usuarios set nivel = :nivel where id = :id"; 
        $cmd = $this->pdo->prepare($sql);
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