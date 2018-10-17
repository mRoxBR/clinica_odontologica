<?php

class Especialidade{

	private $nome;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet;
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

}
?>