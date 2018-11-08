<?php

require_once 'database.php';
require_once 'recepcionista.php';

class Recebimento{
	
	private $id;
	private $quantia;
	private $data;

	public function getId(){
		return $this->id;
	}

	public function getQuantia(){
		return $this->quantia;
	}

	public function getData(){
		return $this->data;
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

	public function setId($data){
        $this->data = $data;
    }

	public function insert(){
		try{	
			$stmt = $this->conn->prepare("INSERT INTO recebimento(data,quantia) VALUES(:data, :quantia)");
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
			$stmt = $this->conn->prepare("UPDATE recebimento SET data = :data, quantia = :quantia WHERE id = :id");
			$stmt->bindParam(":id", $this->id);
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
			$stmt = $this->conn->prepare("DELETE FROM recebimento WHERE id = :id");
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