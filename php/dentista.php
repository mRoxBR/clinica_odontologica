<?php

require_once 'funcionario.php';

class Dentista extends Funcionario{

	private $cro;
	private $especialidade;

	public function getCro(){
		return $this->cro;
	}

	public function getEspecialidade(){
		return $this->especialidade;
	}

	public function setCro($cro){
		$this->cro = $cro;
	}

	public function setEspecialidade($especialidade){
		$this->especialidade = $especialidade;
	}
}

?>