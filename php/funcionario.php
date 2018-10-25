<?php

require_once 'database.php';

class Funcionario{

	private $id;
	private $nome;
	private $sobrenome;
	private $nascimento;
	private $cpf;
	private $salario;

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

	public function getSobrenome(){
		return $this->sobrenome;
	}

	public function getNascimento(){
		return $this->nascimento;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function getSalario(){
		return $this->salario;
	}

	public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        if(strlen($nome) <= 45) {
            $this->nome = $nome;
            return 1;
        }
        return 0;
    }

    public function setSobrenome($sobrenome){
        if(strlen($sobrenome) <= 90) {
            $this->sobrenome = $sobrenome;
            return 1;
        }
        return 0;
    }

    public function setNascimento($nascimento){
    	$this->nascimento = $nascimento;
    }

    public function setCpf($cpf){
    	if($this->validaCPF($cpf)){
    		$this->cpf = $cpf;
    		return 1;
    	}
    	return 0;
    }

    public function setSalario($salario){
    	if($salario >= 0){
    		$this->salario = $salario;
    		return 1;
    	}
    	return 0;
    }

    function validaCPF($cpf = null) {
		// Verifica se o CPF foi informado
		if(empty($cpf)) {
			return false;
		}

		// Elimina possível máscara
		$cpf = preg_replace("/[^0-9]/", "", $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
		
		// Verifica se o número de dígitos informados é igual a 11 
		if (strlen($cpf) != 11) {
			return false;
		}

		// Verifica se nenhuma das sequências inválidas abaixo foi digitada. Caso afirmativo, retorna falso
		else if ($cpf == '00000000000' || 
			$cpf == '11111111111' || 
			$cpf == '22222222222' || 
			$cpf == '33333333333' || 
			$cpf == '44444444444' || 
			$cpf == '55555555555' || 
			$cpf == '66666666666' || 
			$cpf == '77777777777' || 
			$cpf == '88888888888' || 
			$cpf == '99999999999') {
			return false;

		 // Verifica se o CPF é válido por meio dos dígitos verificadores
		 } else {   
			
			for ($t = 9; $t < 11; $t++) {
				
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					return false;
				}
			}

			return true;
		}
	}

	function viewAll(){
		$stmt = $this->conn->prepare("SELECT * FROM funcionario");
		$stmt->execute();
		return $stmt;
	}
}
?>