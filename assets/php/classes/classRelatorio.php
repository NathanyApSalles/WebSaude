<?php

require_once "database.php";

class Relatorio {

	private $idRelatorio;
	private $unidadeAtendimento;
	private $especialidade;
	private $profissional;
	private $data;
	private $leito;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setidRelatorio($value) {
		$this->idRelatorio = $value;
	}

	function setunidadeAtendimento($value) {
		$this->unidadeAtendimento = $value;
	}

	function setespecialidade($value) {
		$this->especialidade = $value;
	}

	function setprofissional($value) {
		$this->profissional = $value;
	}

	function setdata($value) {
		$this->data = $value;
	}

	function setleito($value) {
		$this->leito = $value;
	}

	public function insert() {
		try {
			$stmt = $this->conn->prepare("INSERT INTO `relatorio`(`unidadeAtendimento`, `especialidade`, `profissional`, `data`, `leito`) VALUES (:unidadeAtendimento, :especialidade, :profissional, :data, :leito)");
			$stmt->bindParam(":unidadeAtendimento", $this->unidadeAtendimento);
			$stmt->bindParam(":especialidade", $this->especialidade);
			$stmt->bindParam(":profissional", $this->profissional);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":leito", $this->leito);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit() {
		try {
			$stmt = $this->conn->prepare("UPDATE `relatorio` SET `unidadeAtendimento` = :unidadeAtendimento, `especialidade` = :especialidade, `profissional` = :profissional, `data` = :data, `leito` = :leito WHERE `idRelatorio` = :idRelatorio");
			$stmt->bindParam(":idRelatorio", $this->idRelatorio);
			$stmt->bindParam(":unidadeAtendimento", $this->unidadeAtendimento);
			$stmt->bindParam(":especialidade", $this->especialidade);
			$stmt->bindParam(":profissional", $this->profissional);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":leito", $this->leito);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete() {
		try {
			$stmt = $this->conn->prepare("DELETE FROM `relatorio` WHERE `idRelatorio` = :idRelatorio");
			$stmt->bindParam(":idRelatorio", $this->idRelatorio);
			$stmt->execute();
			return 1;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return 0;
		}
	}

	public function view() {
		$stmt = $this->conn->prepare("SELECT * FROM `relatorio` WHERE `idRelatorio` = :idRelatorio");
		$stmt->bindParam(":idRelatorio", $this->idRelatorio);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function viewUnidade() {
		$stmt = $this->conn->prepare("SELECT * FROM `relatorio` WHERE `unidadeAtendimento` = :unidadeAtendimento");
		$stmt->bindParam(":unidadeAtendimento", $this->unidadeAtendimento);
		$stmt->execute();
		return $stmt;
	}

	public function index() {
		$stmt = $this->conn->prepare("SELECT * FROM `relatorio` WHERE 1 ORDER BY `unidadeAtendimento`");
		$stmt->execute();
		return $stmt;
	}

}
?>