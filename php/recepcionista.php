<?php

require_once 'funcionario.php';

class Recepcionista extends Funcionario{
	private $funcionario_id;
	private $nome_usuario;

	public function getFuncionarioId(){
		return $this->funcionario_id;
	}

	public function getNomeUsuario(){
		return $this->nome_usuario;
	}

	public function setFuncionarioId($funcionario_id){
        $this->funcionario_id = $funcionario_id;
    }

	public function setNomeUsuario($nome_usuario){
        if(strlen($nome_usuario) <= 255){
        	$this->nome_usuario = $nome_usuario;
        	return 1;
        }
        return 0;
    }

	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO recepcionista(funcionario_id, nome_usuario) VALUES(:funcionario_id, :nome_usuario)");
			$stmt->bindParam(":nome_usuario", $this->nome_usuario);
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
			$stmt = $this->conn->prepare("UPDATE recepcionista SET nome_usuario = :nome_usuario WHERE funcionario_id = :funcionario_id");
			$stmt->bindParam(":nome_usuario", $this->nome_usuario);
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
			$stmt = $this->conn->prepare("DELETE FROM recepcionista WHERE funcionario_id = :funcionario_id");
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