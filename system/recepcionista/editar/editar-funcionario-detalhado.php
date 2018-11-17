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


  <body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Atualização de Funcionário
        </div>
        <div class="card-body">
        <?php 

          $cargo = isset($_GET["cargo"])?$_GET["cargo"]:"";
          $id = isset($_GET["id"])?$_GET["id"]:"";

          if($cargo = "Recepcionista"){

            include_once "../../../php/classRecepcionista.php";
            $recepcionista = new Recepcionista();
            $recepcionista->setFuncionarioId($id);
            $resultado = $recepcionista->viewRecepcionista();

          }elseif($cargo = "Administrador"){

            include_once "../../../php/classAdministrador.php";
            $administrador = new Administrador();
            $administrador->setFuncionarioId($id);
            $resultado = $administrador->viewAdministrador();

          }elseif($cargo = "Dentista"){

            include_once "../../../php/classDentista.php";
            $dentista = new Dentista();
            $dentista->setFuncionarioId($id);
            $resultado = $dentista->viewDentista();
          }

            if(isset($_POST['botao'])){

              $id = $_POST["id"];
              $cargo = $_POST["cargo"];

              if($cargo == "Recepcionista"){

                $nome_usuario = $_POST["nome_usuario"];
                $senha = $_POST["senha"];
                $recepcionista->setFuncionarioId($id);
                $recepcionista->setNomeUsuario($nome_usuario);
                $recepcionista->setSenha($senha);
                $estado = $recepcionista->edit();

              }elseif($cargo == "Administrador"){

                $nome_usuario = $_POST["nome_usuario"];
                $senha = $_POST["senha"];
                $administrador->setFuncionarioId($id);
                $administrador->setNomeUsuario($nome_usuario);
                $administrador->setSenha($senha);
                $estado = $administrador->edit();

              }elseif($cargo == "Dentista"){
                $cro = $_POST["cro"];
                $dentista->setFuncionarioId($id);
                $dentista->setCro($cro);
                $estado = $dentistas->edit();
              }  
            header("Location: ../index.php");
            }
            ?>
          <form action="editar-funcionario-detalhado.php" method="post">
  	<?php  if ($cargo == "Recepcionista" || $cargo == "Administrador") { ?>
            <div class="form-group">
              <label>Nome de usuário</label>
              <input type="text" class="form-control" required="required" autofocus="autofocus" name="nome_usuario" value="<?=$resultado->nome_usuario?>">
            </div>
            <div class="form-group">
              <label>Senha</label>
              <input type="password" class="form-control" required="required" autofocus="autofocus" name="senha">
            </div>
    <?php } elseif ($cargo == "Dentista") { ?>
            <div class="form-group">
              <label>CRO</label>
              <input type="text" class="form-control" required="required" autofocus="autofocus" name="cro" value="<?=$resultado->cro?>">
            </div> 
    <?php } ?>
                <input type="hidden" name="id" value=<?=$id?>>
                <input type="hidden" name="cargo" value=<?=$cargo?>>
                <button class="btn btn-primary btn-block" type="submit" name="botao">Atualizar</button>  
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
