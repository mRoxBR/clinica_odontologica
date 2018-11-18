<?php include_once"header.php" ?>
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
              <label>Nome</label>
              <input type="text" class="form-control" required="required" autofocus="autofocus" name="nome">
          </div>
          <div class="form-group">
              <label>Desconto em %</label>
              <input type="number" class="form-control" required="required" name="desconto">
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


