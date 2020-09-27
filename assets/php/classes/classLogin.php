<?php

require_once "database.php";

class Login{

	private $idLogin;
	private $email;
	private $senha;
	private $tipo;
	private $Funcionario_idFuncionario;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setIdLogin($value){
		$this->idLogin = $value;
	}

	function setEmail($value){
		$this->email = $value;
	}

	function setSenha($value){
		$this->senha = $value;
	}

	function setTipo($value){
		$this->tipo = $value;
	}

	function setFuncionario($value){
		$this->Funcionario_idFuncionario = $value;
	}


	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `login` WHERE `idLogin` = :idLogin");
		$stmt->bindParam(":idLogin", $this->idLogin);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function locate(){
		$stmt = $this->conn->prepare("SELECT * FROM `login` WHERE `email` = :email");
		$stmt->bindParam(":email", $this->email);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	
}
?>