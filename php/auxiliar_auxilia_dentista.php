<?php

require_once 'database.php';

class Auxiliar_auxilia_Dentista{

	private $dentistaId;
	private $auxiliarId;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet;
		$this->conn = $dbSet;
	}

	public function getDentistaId(){
		return $this->dentistaId;
	}

	public function getAuxiliarId(){
		return $this->auxiliarId;
	}

	public function setDentistaId($dentistaId){
        $this->dentistaId = $dentistaId;
    }

	public function setAuxiliarId($auxiliarId){
        $this->auxiliarId = $auxiliarId;
    }

}
?>