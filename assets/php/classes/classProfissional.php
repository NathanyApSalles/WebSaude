<?php
require_once "database.php";
class ProfissionalSaude {
	private $idProfissional;
	private $cpf;
	private $nome;
	private $funcao;
	private $telefone;
	private $email;
	private $num_registro;
	private $procedimento;
	private $especialidades;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setidProfissional($value) {
		$this->idProfissional = $value;
	}
	function setNome($value) {
		$this->nome = $value;
	}
	function setCpf($value) {
		$this->cpf = $value;
	}
	function setTelefone($value) {
		$this->telefone = $value;
	}
	function setFuncao($value) {
		$this->funcao = $value;
	}
	function setEmail($value) {
		$this->email = $value;
	}
	function setNum_registro($value) {
		$this->num_registro = $value;
	}
	function setProcedimento($value) {
		$this->procedimento = $value;
	}
	function setEspecialidades($value) {
		$this->especialidades = $value;
	}

	public function insert() {
		try {
			$stmt = $this->conn->prepare("INSERT INTO `profissionalsaude`(`cpf`, `nome`, `funcao`, `telefone`, `email`, `num_registro`, `procedimento`, `especialidades` ) VALUES (:cpf, :nome, :funcao, :telefone, :email, :num_registro, :procedimento, :especialidades)");

			$stmt->bindParam(":cpf", $this->cpf);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":funcao", $this->funcao);
			$stmt->bindParam(":telefone", $this->telefone);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":num_registro", $this->num_registro);
			$stmt->bindParam(":procedimento", $this->procedimento);
			$stmt->bindParam(":especialidades", $this->especialidades);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}
	public function edit() {
		try {
			$stmt = $this->conn->prepare("UPDATE `profissionalsaude` SET `nome` = :nome, `cpf` = :cpf, `telefone` = :telefone, `funcao` = :funcao, `email` = :email, `num_registro` = :num_registro, `procedimento` = :procedimento, `especialidades` = :especialidades WHERE `idProfissional` = :idProfissional");
			$stmt->bindParam(":idProfissional", $this->idProfissional);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":cpf", $this->cpf);
			$stmt->bindParam(":telefone", $this->telefone);
			$stmt->bindParam(":funcao", $this->funcao);
			$stmt->bindParam(":email", $this->email);
			$stmt->bindParam(":num_registro", $this->num_registro);
			$stmt->bindParam(":procedimento", $this->procedimento);
			$stmt->bindParam(":especialidades", $this->especialidades);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete() {
		try {
			$stmt = $this->conn->prepare("DELETE FROM `profissionalsaude` WHERE `idProfissional` = :idProfissional");
			$stmt->bindParam(":idProfissional", $this->idProfissional);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function view() {
		$stmt = $this->conn->prepare("SELECT * FROM `profissionalsaude` WHERE `idProfissional` = :idProfissional");
		$stmt->bindParam(":idProfissional", $this->idProfissional);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}
	public function index() {
		$stmt = $this->conn->prepare("SELECT * FROM `profissionalsaude` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

}
?>