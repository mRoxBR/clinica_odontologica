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
    <?php

    $flag = 0;

    if(isset($_POST['botao'])){ 
        include_once "../../../php/classDentista.php";
        include_once "../../../php/classAuxiliar.php";
        include_once "../../../php/classAuxiliarAuxiliaDentista.php";

        $d = new Dentista();
        $a = new Auxiliar();
        $aad = new Auxiliar_auxilia_Dentista();

        $nome_dentista = $_POST['nome_dentista'];
        $cpf_dentista = $_POST['cpf_dentista'];
        $nome_auxiliar = $_POST['nome_auxiliar'];
        $cpf_auxiliar = $_POST['cpf_auxiliar'];

        if(($id_dentista = $d->existeNomeCpf($nome_dentista, $cpf_dentista)) && ($id_auxiliar = $a->existeNomeCpf($nome_auxiliar, $cpf_auxiliar))){
            $aad->setDentistaId($id_dentista);
            $aad->setAuxiliarId($id_auxiliar);
            $aad->insert();

            header("Location: ../auxilio.php");
        }else{
            $flag = 1;
        }
    }?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Cadastro de Auxílio
        </div>
        <div class="card-body">
        <?php if($flag == 1){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>Os nomes e CPF's informados não estão cadastrados ou não coincidem</b>
          </div>
        <?php } ?>
          <form action="cadastrar-auxilio.php" method="post">
            <div class="form-group">
                <label>Nome do Dentista</label>
                <input type="text" class="form-control" required="required" name="nome_dentista">
            </div>
            <div class="form-group">
                <label>CPF do Dentista</label>
                <input type="text" class="form-control" maxlength="11" name="cpf_dentista">
            </div>
            <div class="form-group">
                <label>Nome do Auxiliar</label>
                <input type="text" class="form-control" required="required" name="nome_auxiliar">
            </div>
            <div class="form-group">
                <label>CPF do Auxiliar</label>
                <input type="text" class="form-control" maxlength="11" name="cpf_auxiliar">
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


