<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atualização</title>

    <!-- Bootstrap core CSS-->
    <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin.css" rel="stylesheet">

    <link href="../../../css/style.css" rel="stylesheet">

  </head>
  <?php 
    include_once "../../../php/classFuncionario.php";


    $id = $_GET['id'];
    $funcionario = new Funcionario();
    $funcionario->setId($id);
    $resultado = $funcionario->viewFuncionario();
    $cargo = $resultado->cargo;

    $flag = 0;

  if(isset($_POST['botao'])){ 

    $id = $_POST["id"];
    $cargo = $_POST["cargo"];

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $nascimento = $_POST["nascimento"];
    $salario = $_POST["salario"];
    $cpf = $_POST["cpf"];

    $funcionario->setId($id);
    $funcionario->setNome($nome);
    $funcionario->setSobrenome($sobrenome);
    $funcionario->setNascimento($nascimento);
    $funcionario->setSalario($salario);
    $funcionario->setCargo($cargo);

    if(!$funcionario->setCpf($cpf)) $flag = 1;

    if($flag == 0){ 
        $funcionario->edit();
        header("Location:editar-funcionario-detalhado.php?id=$id&cargo=$cargo");
    }
    
  }?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Atualização de Funcionário
        </div>
        <div class="card-body">
        <?php if($flag == 1) { ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>O CPF informado não é válido</b>
          </div>
        <?php } ?>
          <form action="editar-funcionario.php" method="post">
            <div class="form-group">
                <label>Primeiro nome</label>
                <input type="text" class="form-control" required="required" autofocus="autofocus" name="nome" value="<?= $resultado->nome ?>">
            </div>
            <div class="form-group">
                <label>Sobrenome</label>
                <input type="text" class="form-control" required="required" name="sobrenome" value="<?= $resultado->sobrenome ?>">
            </div>
            <div class="form-group">
                <label>Data de nascimento</label>
                <input type="date" class="form-control" required="required" name="nascimento" value="<?= $resultado->nascimento ?>">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" maxlength="11" name="cpf" value="<?= $resultado->cpf ?>">
            </div>
            <div class="form-group">
                <label>Salário</label>
                <input type="number" class="form-control" required="required" name="salario" value="<?= $resultado->salario ?>">
            </div>
            <input type="hidden" name="id" value=<?=$id?>>
            <input type="hidden" name="cargo" value=<?=$cargo?>>
            <button class="btn btn-primary btn-block" type="submit" name="botao">Avançar</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>
</html>


