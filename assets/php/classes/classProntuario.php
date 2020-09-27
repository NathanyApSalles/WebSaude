<?php

require_once "database.php";

class Prontuario {

	private $idprontuario;
	private $nome;
	private $idade;
	private $altura;
	private $peso;
	private $IMC;
	private $tipoSanguineo;
	private $alergias;
	private $medicamentos;
	private $ultimos_exames;
	private $cpf;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setIdProntuario($value) {
		$this->idprontuario = $value;
	}

	function setnome($value) {
		$this->nome = $value;
	}

	function setidade($value) {
		$this->idade = $value;
	}

	function setaltura($value) {
		$this->altura = $value;
	}

	function setpeso($value) {
		$this->peso = $value;
	}

	function setIMC($value) {
		$this->IMC = $value;
	}
	function settipoSanguineo($value) {
		$this->tipoSanguineo = $value;
	}
	function setalergias($value) {
		$this->alergias = $value;
	}
	function setmedicamentos($value) {
		$this->medicamentos = $value;
	}
	function setultimos_exames($value) {
		$this->ultimos_exames = $value;
	}
	function setcpf($value) {
		$this->cpf = $value;
	}

/*
public function insert(){
try{
$stmt = $this->conn->prepare("INSERT INTO `fornecedor`(`nome`, `nomeRepresentante`, `cnpj`, `endereco`, `telefoneEmpresa`,`telefoneRepresentante`,`emailEmpresa`,`emailRepresentante`) VALUES (:nomeEmpresa, :nomeRepresentante, :cnpj, :endereco, :telefoneEmpresa, :telefoneRepresentante, :emailEmpresa, :emailRepresentante)");
$stmt->bindParam(":nomeEmpresa", $this->nomeEmpresa);
$stmt->bindParam(":nomeRepresentante", $this->nomeRepresentante);
$stmt->bindParam(":cnpj", $this->cnpj);
$stmt->bindParam(":endereco", $this->endereco);
$stmt->bindParam(":telefoneEmpresa", $this->telefoneEmpresa);
$stmt->bindParam(":telefoneRepresentante", $this->telefoneRepresentante);
$stmt->bindParam(":emailEmpresa", $this->emailEmpresa);
$stmt->bindParam(":emailRepresentante", $this->emailRepresentante);
$stmt->execute();
return 1;
}catch(PDOException $e){
echo $e->getMessage();
return 0;
}
} */

	public function edit() {
		try {
			$stmt = $this->conn->prepare("UPDATE `prontuario` SET `altura` = :altura, `peso` = :peso, `IMC` = :IMC, `alergias` = :alergias, `medicamentos` = :medicamentos, `ultimos_exames` = :ultimos_exames WHERE `idprontuario` = :idprontuario");
			$stmt->bindParam(":idprontuario", $this->idprontuario);
			$stmt->bindParam(":altura", $this->altura);
			$stmt->bindParam(":peso", $this->peso);
			$stmt->bindParam(":IMC", $this->IMC);
			$stmt->bindParam(":alergias", $this->alergias);
			$stmt->bindParam(":medicamentos", $this->medicamentos);
			$stmt->bindParam(":ultimos_exames", $this->ultimos_exames);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete() {
		try {
			$stmt = $this->conn->prepare("DELETE FROM `prontuario` WHERE `idprontuario` = :idprontuario");
			$stmt->bindParam(":idprontuario", $this->idprontuario);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function view() {
		$stmt = $this->conn->prepare("SELECT * FROM `prontuario` WHERE `idprontuario` = :idprontuario");
		$stmt->bindParam(":idprontuario", $this->idprontuario);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function viewCPF() {
		$stmt = $this->conn->prepare("SELECT * FROM `prontuario` WHERE `cpf` = :cpf");
		$stmt->bindParam(":cpf", $this->cpf);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index() {
		$stmt = $this->conn->prepare("SELECT * FROM `prontuario` WHERE 1 ORDER BY `nome`");
		$stmt->execute();
		return $stmt;
	}

}
?>