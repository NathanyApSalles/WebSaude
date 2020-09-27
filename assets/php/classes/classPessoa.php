<?php
require_once "database.php";
class Pessoa{
	private $idPessoa;
	private $nome;
	private $cpf;
	private $telefone;
	private $data_nascimento;
	private $email;	
	private $sexo;
	private $sexo;
	private $cargo;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}
	
	function setidPessoa($value){
		$this->idPessoa = $value;
	}
	function setNome($value){
		$this->nome = $value;
	}
	function setCpf($value){
		$this->cpf = $value;
	}
	function setEndereco($value){
		$this->endereco = $value;
	}
	function setCargo($value){
		$this->cargo = $value;
	}
	
	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `funcionario`(`nome`, `cpf`, `endereco`, `cargo`) VALUES (:nome, :cpf, :endereco, :cargo)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cpf", $this->cpf);
			$stmt->bindParam(":endereco", $this->endereco);
			$stmt->bindParam(":cargo", $this->cargo);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `funcionario` SET `nome` = :nome, `cpf` = :cpf, `endereco` = :endereco, `cargo` = :cargo WHERE `idPessoa` = :idPessoa");
			$stmt->bindParam(":idPessoa", $this->idPessoa);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cpf", $this->cpf);
			$stmt->bindParam(":endereco", $this->endereco);
			$stmt->bindParam(":cargo", $this->cargo);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `funcionario` WHERE `idPessoa` = :idPessoa");
			$stmt->bindParam(":idPessoa", $this->idPessoa);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE `idPessoa` = :idPessoa");
		$stmt->bindParam(":idPessoa", $this->idPessoa);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `funcionario` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}
	
}
?>