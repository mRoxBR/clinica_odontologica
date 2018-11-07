<?php

require_once 'funcionario.php';

class Auxiliar extends Funcionario{
	private $funcionario_id;

	public function getFuncionarioId(){
		return $this->funcionario_id;
	}

	public function setFuncionarioId($funcionario_id){
        $this->funcionario_id = $funcionario_id;
    }

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO auxiliar(funcionario_id) VALUES(:funcionario_id)");
			$stmt->bindParam(":funcionario_id", $this->funcionario_id);
			$stmt->execute();
			return $this->conn->lastInsertId();
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM auxiliar WHERE funcionario_id = :funcionario_id");
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
