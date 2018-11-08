<?php

require_once 'database.php';

class Despesa{

	private $id;
	private $nome;
	private $data;
	private $quantia;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getData(){
		return $this->data;
	}

	public function getQuantia(){
		return $this->quantia;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setNome($nome){
		if(strlen($nome) <= 45){
			$this->nome = $nome;
			return 1;
		}
		return 0;
	}

	public function setData($data){
		$this->data = $data;
	}

	public function setQuantia($quantia){
		if($quantia > 0){
			$this->quantia = $quantia;
			return 1;
		}
		return 0;
	}

	public function insert(){
		try{	
			$stmt = $this->conn->prepare("INSERT INTO despesa(nome,data,quantia) VALUES(:nome, :data, :quantia)");
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":quantia", $this->quantia);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;	
		}
	}	

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE despesa SET nome = :nome, data = :data, quantia = :quantia WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":nome", $this->nome);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":quantia", $this->quantia);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM despesa WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

}

?>