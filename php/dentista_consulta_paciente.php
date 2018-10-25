<?php

require_once 'database.php';

class Dentista_consulta_Paciente{

	private $dentistaId;
	private $pacienteId;
	private $data;
	private $horario;
	private $valor;
	private $situacao;

	public function __construct(){
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function getDentistaId(){
		return $this->dentistaId;
	}

	public function getPacienteId(){
		return $this->PacienteId;
	}

	public function getData(){
		return $this->data;
	}

	public function getHorario(){
		return $this->horario;
	}

	public function getValor(){
		return $this->valor;
	}

	public function getSituacao(){
		return $this->situacao;
	}


	public function setDentistaId($dentistaId){
        $this->dentistaId = $dentistaId;
    }

	public function setPacienteId($pacienteId){
        $this->pacienteId = $pacienteId;
    }

	public function setData($data){
        $this->data = $data;
    }

	public function setHorario($horario){
        $this->horario = $horario;
    }

	public function setValor($valor){
        if($valor > 0){
        	$this->valor = $valor;
        	return 1;
        }
        return 0;
    }

	public function setSituacao($situacao){
        $this->situacao = $situacao;
    }
}

?>