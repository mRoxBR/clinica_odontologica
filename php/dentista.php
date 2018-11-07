<?php

require_once 'funcionario.php';

class Dentista extends Funcionario{

	private $funcionario_id;
	private $cro;

	public function getFuncionarioId(){
		return $this->funcionario_id;
	}

	public function getCro(){
		return $this->cro;
	}

	public function setFuncionarioId($funcionario_id){
        $this->funcionario_id = $funcionario_id;
    }

	public function setCro($cro){
		if(strlen($cro) <= 7){
			$this->cro = $cro;
			return 1;
		}
		return 0;
	}

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO dentista(funcionario_id, cro) VALUES(:funcionario_id, :cro)");
			$stmt->bindParam(":cro", $this->cro);
			$stmt->bindParam(":funcionario_id", $this->funcionario_id);
			$stmt->execute();
			return $this->conn->lastInsertId();
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE dentista SET cro = :cro WHERE funcionario_id = :funcionario_id");
			$stmt->bindParam(":cro", $this->cro);
			$stmt->bindParam(":funcionario_id", $this->funcionario_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM dentista WHERE funcionario_id = :funcionario_id");
			$stmt->bindParam(":funcionario_id", $this->funcionario_id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

}

?>