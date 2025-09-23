<?php 

use function PHPSTORM_META\sql_injection_subst;

include_once "db.php";

// POO com PHP 
class Produto{

    // Atributos
    private $id;
    private $tipoId;
    private $descricao;
    private $resumo;
    private $valor;
    private $imagem;
    private $destaque;

    private $pdo;

    public function __construct(){
        $this->pdo = getConnection();
    }

    //Getters e Setters - Propriedades ou métodos de acesso!
    public function getId(){
        return $this->id; // o banco é quem atribui 
    }

    public function getTipoId(){
        return $this->tipoId;
    }

    public function setTipoId(string $tipoId){
        $this->tipoId = $tipoId;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }

    public function getResumo(){
        return $this->resumo;
    }

    public function setResumo(string $resumo){
        $this->resumo = $resumo;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor(float $valor){
        $this->valor = $valor;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function setImagem(string $imagem){
        $this->imagem = $imagem;
    }
    
    public function getDestaque(){
        return $this->destaque;
    }

    public function setDestaque(bool $destaque){
        $this->destaque = $destaque;
    }

    // inserindo usuario
    public function inserir() : bool {
        $sql = "insert into produtos (tipo_id, descricao, resumo, valor, imagem, destaque)
        values (:tipoId, :descricao, :resumo, :valor, :imagem, :destaque)";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":tipoId", $this->tipoId);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":resumo", $this->resumo);
        $cmd->bindValue(":valor", $this->valor);
        $cmd->bindValue(":imagem", $this->imagem);
        $cmd->bindValue(":destaque", $this->destaque);
        $cmd->execute();
        if($cmd->execute()){
            $this->id = $this->pdo->lastInsertId();
            return true;
        }
        return false;
    }

    // Método para listar todos os produtos!
    public function listar(int $destaque = 0) : array{
        if($destaque == 0)
            $cmd = $this->pdo->query("select * from vw_produtos order by id desc");
        else
            $cmd = $this->pdo->query("select * from vw_produtos where destaque = 1 order by id desc");

        return $cmd->fetchAll();
    }

    public function obterPorId(int $id) : array{
        $sql = "select * from vw_produtos where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $dados = $cmd->fetch();
        
        return $dados;
    }

    public function obterPorTipoId(int $id) : array{
        $sql = "select * from vw_produtos where tipo_id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $id);
        $cmd->execute();
        $dados = $cmd->fetchAll();
        
        return $dados;
    }

    // buscar produtos por texto na desecrição ou no resumo
    public function obterPorString(string $busca) : array{
        $sql = "select * from vw_produtos where descricao like '% $busca%' or resumo like '% $busca%'
        order by descricao asc";
        $cmd = $this->pdo->prepare($sql);
        $cmd->execute();
        $dados = $cmd->fetchAll();
        
        return $dados;
    }


    public function atualizar(int $idUpdate){
        $id = $idUpdate;
        if(!$this->id) return false;

        $sql = "update produtos set 
            tipo_id = :tipo_id, 
            descricao = :descricao,
            resumo = :resumo, 
            valor = :valor, 
            imagem = :imagem,
            destaque = :destaque
            where id = :id";

        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":tipo_Id", $this->tipoId);
        $cmd->bindValue(":descricao", $this->descricao);
        $cmd->bindValue(":resumo", $this->resumo);
        $cmd->bindValue(":valor", $this->valor);
        $cmd->bindValue(":imagem", $this->imagem);
        $cmd->bindValue(":destaque", $this->destaque);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }

    public function excluir(int $idDelete) :bool{
        $this->id = $idDelete;
        if(!$this->id) return false;

        $sql = "delete from produtos where id = :id";
        $cmd = $this->pdo->prepare($sql);
        $cmd->bindValue(":id", $this->id, PDO::PARAM_INT);

        return $cmd->execute();
    }
}

?>