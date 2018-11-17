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
        include_once "../../../php/classEspecialidade.php";
        include_once "../../../php/classDentistaHasEspecialidade.php";

        $d = new Dentista();
        $e = new Especialidade();
        $dhe = new Dentista_has_Especialidade();

        $nome_dentista = $_POST['nome_dentista'];
        $cpf_dentista = $_POST['cpf_dentista'];
        $especialidade = $_POST['especialidade'];

        if($id_dentista = $d->existeNomeCpf($nome_dentista, $cpf_dentista)){
            $dhe->setDentistaId($id_dentista);
            $dhe->setEspecialidadeNome($especialidade);
            $dhe->insert();

            header("Location: ../especialidades-dentistas.php");
        }else{
            $flag = 1;
        }
    }?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Cadastro de Especialidade para Dentista
        </div>
        <div class="card-body">
        <?php if($flag == 1){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>O nome e o CPF informados não estão cadastrados ou não coincidem</b>
          </div>
        <?php } ?>
          <form action="cadastrar-especialidade-dentista.php" method="post">
            <div class="form-group">
                <label>Nome do Dentista</label>
                <input type="text" class="form-control" required="required" name="nome_dentista">
            </div>
            <div class="form-group">
                <label>CPF do Dentista</label>
                <input type="text" class="form-control" maxlength="11" name="cpf_dentista">
            </div>

            <div class="form-group">
                <label>Especialidade</label><br>
                <select name="especialidade">
                <?php 
                include_once "../../../php/classEspecialidade.php";
                $e = new Especialidade();
                $stmt = $e->viewAll();

                while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                <option value= <?= $row->nome; ?>> <?= $row->nome; ?> </option>
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


