<?php

require_once 'database.php';
require_once 'classRecepcionista.php';

class Recebimento{
	
	private $id;
	private $quantia;
	private $data;
	private $recepcionista_id;
	private $paciente_id;
	private $modo_pagamento;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function getId(){
		return $this->id;
	}

	public function getQuantia(){
		return $this->quantia;
	}

	public function getData(){
		return $this->data;
	}

	public function getModoPagamento(){
		return $this->modo_pagamento;
	}

	public function getRecepcionistaId(){
		return $this->recepcionista_id;
	}

	public function getPacienteId(){
		return $this->paciente_id;
	}

	public function setId($id){
        $this->id = $id;
    }

	public function setQuantia($quantia){
     	if($quantia > 0){   
        	$this->quantia = $quantia;
    		return 1;
    	}
    	return 0;
    }

	public function setData($data){
        $this->data = $data;
    }

	public function setModoPagamento($modo_pagamento){
        if(strlen($modo_pagamento) <= 45){
        	$this->modo_pagamento = $modo_pagamento;
        	return 1;
       	}
       	return 0;
    }

	public function setRecepcionistaId($recepcionista_id){
        $this->recepcionista_id = $recepcionista_id;
    }

	public function setPacienteId($paciente_id){
        $this->paciente_id = $paciente_id;
    }

	public function insert(){
		try{	
			$stmt = $this->conn->prepare("INSERT INTO recebimento(quantia, data, modo_pagamento, recepcionista_id, paciente_id) VALUES(:quantia, :data, :modo_pagamento, :recepcionista_id, :paciente_id)");
			$stmt->bindParam(":quantia", $this->quantia);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":modo_pagamento", $this->modo_pagamento);
			$stmt->bindParam(":recepcionista_id", $this->recepcionista_id);
			$stmt->bindParam(":paciente_id", $this->paciente_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;	
		}
	}	

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE recebimento SET quantia = :quantia, data = :data, modo_pagamento = :modo_pagamento, recepcionista_id = :recepcionista_id, paciente_id = :paciente_id WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":quantia", $this->quantia);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":modo_pagamento", $this->modo_pagamento);
			$stmt->bindParam(":recepcionista_id", $this->recepcionista_id);
			$stmt->bindParam(":paciente_id", $this->paciente_id);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM recebimento WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function viewAll(){
		$stmt = $this->conn->prepare("SELECT * FROM recebimento");
		$stmt->execute();
		return $stmt;
	}

}

?>