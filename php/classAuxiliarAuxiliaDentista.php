<?php

require_once 'database.php';

class Auxiliar_auxilia_Dentista{

	private $dentista_id;
	private $auxiliarid;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function getDentistaId(){
		return $this->dentista_id;
	}

	public function getAuxiliarId(){
		return $this->auxiliar_id;
	}

	public function setDentistaId($dentista_id){
        $this->dentista_id = $dentista_id;
    }

	public function setAuxiliarId($auxiliar_id){
        $this->auxiliar_id = $auxiliar_id;
    }

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO auxiliar_auxilia_dentista(dentista_id, auxiliar_id) VALUES(:dentista_id, :auxiliar_id)");
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":auxiliar_id", $this->auxiliar_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM auxiliar_auxilia_dentista WHERE dentista_id = :dentista_id AND auxiliar_id = :auxiliar_id");
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":auxiliar_id", $this->auxiliar_id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function viewAll(){
		$stmt = $this->conn->prepare("SELECT * FROM auxiliar_auxilia_dentista");
		$stmt->execute();
		return $stmt;
	}

}
?>