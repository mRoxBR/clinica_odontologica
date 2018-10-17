<?php

require_once 'funcionario.php';

class Dentista extends Funcionario{

	private $cro;

	public function getCro(){
		return $this->cro;
	}

	public function setCro($cro){
		if(strlen($cro) <= 7){
			$this->cro = $cro;
			return 1;
		}
		return 0;
	}
}

?>