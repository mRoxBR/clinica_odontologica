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

}

?>