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
    <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin.css" rel="stylesheet">

    <link href="../../../css/style.css" rel="stylesheet">

  </head>
  <?php if(isset($_POST['botao'])){ 
    include_once "../../../php/classPaciente.php";
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $cpf = $_POST['cpf'];
    $plano_dentario = $_POST['plano_dentario'];

    $paciente = new Paciente();
    
    $paciente->setNome($nome);
    $paciente->setSobrenome($sobrenome);
    $paciente->setNascimento($nascimento);
    $paciente->setCpf($cpf);
    $paciente->setPlanoDentarioId($plano_dentario);
    $paciente->insert();

    header("Location: ../pacientes.php");
  }?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Cadastro de Paciente
        </div>
        <div class="card-body">
          <form action="cadastrar-paciente.php" method="post">
            <div class="form-group">
                <label>Primeiro nome</label>
                <input type="text" class="form-control" required="required" autofocus="autofocus" name="nome">
            </div>
            <div class="form-group">
                <label>Sobrenome</label>
                <input type="text" class="form-control" required="required" name="sobrenome">
            </div>
            <div class="form-group">
                <label>Data de nascimento</label>
                <input type="date" class="form-control" required="required" name="nascimento">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" maxlength="11" name="cpf">
            </div>
            <div class="form-group">
              <label>Plano Dentário</label><br>
              <select id="select-paciente" name="plano_dentario">
                <?php 
                include_once "../../../php/classPlanoDentario.php";
                $planoDentario = new PlanoDentario();
                $stmt = $planoDentario->viewAll();

                while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                <option value= <?= $row->id; ?>> <?= $row->nome; ?> </option>
                <?php } ?>
              </select>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="botao">Cadastrar</button>
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


