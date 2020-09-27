<?php

require_once "database.php";

class Vacina {

	private $idvacina;
	private $idprontuario;
	private $nomeVacina;
	private $dose;
	private $data;
	private $lote;
	private $unidade;
	private $profissional;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setIdvacina($value) {
		$this->idvacina = $value;
	}

	function setIdProntuario($value) {
		$this->idprontuario = $value;
	}

	function setnomeVacina($value) {
		$this->nomeVacina = $value;
	}

	function setdose($value) {
		$this->dose = $value;
	}

	function setdata($value) {
		$this->data = $value;
	}

	function setlote($value) {
		$this->lote = $value;
	}

	function setunidade($value) {
		$this->unidade = $value;
	}
	function setprofissional($value) {
		$this->profissional = $value;
	}

	public function view() {
		$stmt = $this->conn->prepare("SELECT * FROM `vacina` WHERE `idprontuario` = :idprontuario");
		$stmt->bindParam(":idprontuario", $this->idprontuario);
		$stmt->execute();
		//$row = $stmt->fetch(PDO::FETCH_OBJ);
		//return $row;
		return $stmt;
	}

	public function index() {
		$stmt = $this->conn->prepare("SELECT * FROM `vacina` WHERE 1 ORDER BY `nomeVacina`");
		$stmt->execute();
		return $stmt;
	}

}
?>