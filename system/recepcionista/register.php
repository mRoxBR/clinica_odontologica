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

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Cadastro de Funcionário</div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="firstName" class="form-control" placeholder="Primeiro nome" required="required" autofocus="autofocus" name="name">
                <label for="firstName">Primeiro nome</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="lastName" class="form-control" placeholder="Sobrenome" required="required" name="sobrenome">
                <label for="lastName">Sobrenome</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="date" id="inputEmail" class="form-control" placeholder="Data de nascimento" required="required" name="nascimento">
                <label for="inputEmail">Data de nascimento</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="CPF" required="required" name="cpf">
                <label for="inputEmail">CPF</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" id="inputEmail" class="form-control" placeholder="Salário" required="required" name="salario">
                <label for="inputEmail">Salário</label>
              </div>
            </div>
            <a class="btn btn-primary btn-block" href="login.php">Cadastrar</a>
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

</html>
