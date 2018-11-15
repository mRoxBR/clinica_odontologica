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
    include_once "../../../php/classPlanoDentario.php";
    
    $nome = $_POST['nome'];
    $desconto = $_POST['desconto'];

    $p = new PlanoDentario();
    
    $p->setNome($nome);
    $p->setDesconto($desconto);
    $p->insert();

    header("Location: ../planos-dentarios.php");

  }else{ ?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Cadastro de Plano Dentário
        </div>
        <div class="card-body">
          <form action="cadastrar-plano-dentario.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome" required="required" autofocus="autofocus" name="nome">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Desconto" required="required" name="desconto">
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
<?php } ?>
</html>


