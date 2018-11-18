<?php

session_start();

function verificaFuncionarioLogado(){
	if(!isset($_SESSION["funcionario"])){
		header("Location: ../../index.php");
	}
}

function verificaFuncionarioLogadoCadastro(){
	if(!isset($_SESSION["funcionario"])){
		header("Location: ../../../index.php");
	}
}
?>