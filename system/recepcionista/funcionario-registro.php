<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">

    <link href="../../css/style.css" rel="stylesheet">

  </head>
  <?php if(isset($_POST['botao'])){ 
    include_once "../../php/classFuncionario.php";
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $cpf = $_POST['cpf'];
    $salario = $_POST['salario'];
    $tipo = $_POST['tipo'];

    $funcionario = new Funcionario();
    
    $funcionario->setNome($nome);
    $funcionario->setSobrenome($sobrenome);
    $funcionario->setNascimento($nascimento);
    $funcionario->setCpf($cpf);
    $funcionario->setSalario($salario);
    $lastid = $funcionario->insert();

    header("Location:funcionario-registro-detalhado.php?lastid=$lastid&tipo=$tipo");

  }else{ ?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Cadastro de Funcionário
        </div>
        <div class="card-body">
          <form action="funcionario-registro.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Primeiro nome" required="required" autofocus="autofocus" name="nome">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Sobrenome" required="required" name="sobrenome">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" placeholder="Data de nascimento" required="required" name="nascimento">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="CPF" maxlength="11" name="cpf">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Salário" required="required" name="salario">
            </div>
            <div class="form-group">
              <select id="select-funcionario" name="tipo">
                <option value="administrador">Administrador</option>
                <option value="auxiliar">Auxiliar</option>
                <option value="dentista">Dentista</option>
                <option value="recepcionista">Recepcionista</option>
              </select>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="botao">Avançar</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>
<?php } ?>
</html>


