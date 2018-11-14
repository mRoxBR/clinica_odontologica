<?php

require_once 'database.php';

class Dentista_consulta_Paciente{

	private $dentista_id;
	private $paciente_id;
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
		return $this->dentista_id;
	}

	public function getPacienteId(){
		return $this->paciente_id;
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


	public function setDentistaId($dentista_id){
        $this->dentista_id = $dentista_id;
    }

	public function setPacienteId($paciente_id){
        $this->paciente_id = $paciente_id;
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
	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO dentista_consulta_paciente(paciente_id, dentista_id, data, horario, valor, situacao) VALUES(:paciente_id, :dentista_id, :data, :horario, :valor, :situacao)");
			$stmt->bindParam(":paciente_id", $this->paciente_id);
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":horario", $this->horario);
			$stmt->bindParam(":valor", $this->valor);
			$stmt->bindParam(":situacao", $this->situacao);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE dentista_consulta_paciente SET paciente_id = :paciente_id, dentista_id = :dentista_id, data = :data, horario = :horario, valor = :valor, situacao = :situacao WHERE dentista_id = :dentista_id AND paciente_id = :paciente_id");
			$stmt->bindParam(":paciente_id", $this->paciente_id);
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":data", $this->data);
			$stmt->bindParam(":horario", $this->horario);
			$stmt->bindParam(":valor", $this->valor);
			$stmt->bindParam(":situacao", $this->situacao);
			$stmt->bindParam(":dentista_id", $this->dentista_id);
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
			$stmt = $this->conn->prepare("DELETE FROM dentista_consulta_paciente WHERE dentista_id = :dentista_id AND paciente_id = :paciente_id");
			$stmt->bindParam(":dentista_id", $this->dentista_id);
			$stmt->bindParam(":paciente_id", $this->paciente_id);
			$stmt->execute();
			return 1;
		}catch(PDOExcecption $e){
			echo $e->getMessage();
			return 0;
		}
	}
}

?>