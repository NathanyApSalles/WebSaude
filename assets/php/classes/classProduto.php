<?php

require_once "database.php";

class Produto{

	private $idProduto;
	private $nome;
	private $quantidade;
	private $descricao;
	private $precoCusto;
	private $precoVenda;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setIdProduto($value){
		$this->idProduto = $value;
	}

	function setNome($value){
		$this->nome = $value;
	}

	function setQuantidade($value){
		$this->quantidade = $value;
	}

	function setDescricao($value){
		$this->descricao = $value;
	}

	function setPrecoCusto($value){
		$this->precoCusto = $value;
	}

	function setPrecoVenda($value){
		$this->precoVenda = $value;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `produto`(`nome`, `quantidade`, `descricao`, `precoCusto`, `precoVenda`) VALUES (:nome, :quantidade, :descricao, :precoCusto, :precoVenda)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":quantidade", $this->quantidade);
			$stmt->bindParam(":descricao", $this->descricao);
			$stmt->bindParam(":precoCusto", $this->precoCusto);
			$stmt->bindParam(":precoVenda", $this->precoVenda);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `produto` SET `nome` = :nome, `quantidade` = :quantidade, `descricao` = :descricao, `precoCusto` = :precoCusto, `precoVenda` = :precoVenda WHERE `idProduto` = :idProduto");
			$stmt->bindParam(":idProduto", $this->idProduto);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":quantidade", $this->quantidade);
			$stmt->bindParam(":descricao", $this->descricao);
			$stmt->bindParam(":precoCusto", $this->precoCusto);
			$stmt->bindParam(":precoVenda", $this->precoVenda);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `produto` WHERE `idProduto` = :idProduto");
			$stmt->bindParam(":idProduto", $this->idProduto);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `produto` WHERE `idProduto` = :idProduto");
		$stmt->bindParam(":idProduto", $this->idProduto);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `produto` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}
	
}
?>