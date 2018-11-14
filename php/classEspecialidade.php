<?php

require_once 'database.php';

class Especialidade{

	private $nome;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		if(strlen($nome) <= 45){
			$this->nome = $nome;
			return 1;
		}
		return 0;
	}

	public function insert(){
		try{	
			$stmt = $this->conn->prepare("INSERT INTO especialidade(nome) VALUES(:nome)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;	
		}
	}	

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM especialidade WHERE nome = :nome");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

}
?>