<?php

require_once 'database.php';

class Dentista_has_Especialidade{

	private $dentista_id;
	private $especialidade_nome;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function getDentistaId(){
		return $this->dentista_id;
	}

	public function getEspecialidadeNome(){
		return $this->especialidade_nome;
	}

	public function setDentistaId($dentista_id){
        $this->dentista_id = $dentista_id;
    }

	public function setEspecialidadeNome($especialidade_nome){
        $this->especialidade_nome = $especialidade_nome;
    }

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO dentista_has_especialidade(dentista_id, especialidade_nome) VALUES(:dentista_id, :especialidade_nome)");
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":especialidade_nome", $this->especialidade_nome);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM dentista_has_especialidade WHERE dentista_id = :dentista_id AND especialidade_nome = :especialidade_nome");
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":especialidade_nome", $this->especialidade_nome);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

}

?>