<?php

require_once 'database.php';

class Dentista_has_Especialidade{

	private $dentistaId;
	private $especialidadeNome;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet;
		$this->conn = $dbSet;
	}

	public function getDentistaId(){
		return $this->dentistaId;
	}

	public function getEspecialidadeNome(){
		return $this->especialidadeNome;
	}

	public function setDentistaId($dentistaId){
        $this->dentistaId = $dentistaId;
    }

	public function setEspecialidadeNome($especialdiadeNome){
        $this->especialidadeNome = $especialidadeNome;
    }

}

?>