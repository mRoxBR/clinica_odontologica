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
        include_once "../../../php/classPaciente.php";
        include_once "../../../php/classRecepcionista.php";
        include_once "../../../php/classRecebimento.php";

        $paciente = new Paciente();
        $recepcionista = new Recepcionista();
        $recebimento = new Recebimento();

        $quantia = $_POST['quantia'];
        $data = $_POST['data'];
        $nome_recepcionista = $_POST['nome_recepcionista'];
        $cpf_recepcionista = $_POST['cpf_recepcionista'];
        $nome_paciente = $_POST['nome_paciente'];
        $cpf_paciente = $_POST['cpf_paciente'];


        $paciente->setNome($nome_paciente);
        $paciente->setCpf($cpf_paciente);
        
        
        if(($id_recepcionista = $recepcionista->existeNomeCpf($nome_recepcionista, $cpf_recepcionista)) && ($id_paciente = $paciente->existeNomeCpf())){
            $recebimento->setQuantia($quantia);
            $recebimento->setData($data);
            $recebimento->setRecepcionistaId($id_recepcionista);
            $recebimento->setPacienteId($id_paciente);
            $recebimento->insert();

            header("Location: ../recebimentos.php");
        }else{
            $flag = 1;
        }
    }?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Cadastro de Recebimento
        </div>
        <div class="card-body">
        <?php if($flag == 1){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>Os nomes e CPF's informados não estão cadastrados ou não coincidem</b>
          </div>
        <?php } ?>
          <form action="cadastrar-recebimento.php" method="post">
            <div class="form-group">
                <label>Quantia</label>
                <input type="number" class="form-control" required="required" autofocus="autofocus" name="quantia">
            </div>
            <div class="form-group">
                <label>Data</label>
                <input type="date" class="form-control" required="required" name="data">
            </div>
            <div class="form-group">
                <label>Nome do Recepcionista</label>
                <input type="text" class="form-control" required="required" name="nome_recepcionista">
            </div>
            <div class="form-group">
                <label>CPF do Recepcionista</label>
                <input type="text" class="form-control" maxlength="11" name="cpf_recepcionista">
            </div>
            <div class="form-group">
                <label>Nome do Paciente</label>
                <input type="text" class="form-control" required="required" name="nome_paciente">
            </div>
            <div class="form-group">
                <label>CPF do Paciente</label>
                <input type="text" class="form-control" maxlength="11" name="cpf_paciente">
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


