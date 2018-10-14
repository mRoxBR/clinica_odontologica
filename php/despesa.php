<?php

class Despesa{

	private $nome;
	private $data;
	private $quantia;
	private $situacao;

	public function getNome(){
		return $this->nome;
	}

	public function getData(){
		return $this->data;
	}

	public function getQuantia(){
		return $this->quantia;
	}

	public function getSituacao(){
		return $this->situacao;
	}

	public function setNome($nome){
		$this->nome = $nome;
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

	public function setSituacao($situacao){
		$this->situacao = $situacao;
	}
}

?>