<?php include_once "header.php" ?>
<?php 
include_once "../../../php/classDespesa.php";
$d = new Despesa();

if(isset($_POST['botao'])){ 

$id = $_POST['id'];
$nome = $_POST['nome'];
$data = $_POST['data'];
$valor = $_POST['valor'];
$tipo = $_POST['tipo'];
$situacao = $_POST['situacao'];

$d->setId($id);
$d->setNome($nome);
$d->setData($data);
$d->setValor($valor);
$d->setTipo($tipo);
$d->setSituacao($situacao);
var_dump($d->edit());

header("Location: ../despesas.php");
}else{
    $id = $_GET['id'];
    $d = new Despesa();
    $d->setId($id);
    $despesa = $d->viewDespesa();
} 
?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Atualização de Despesa
        </div>
        <div class="card-body">
          <form action="editar-despesa.php" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" required="required" autofocus="autofocus" name="nome" value="<?=$despesa->nome?>">
            </div>
            <div class="form-group">
                <label>Data</label>
                <input type="date" class="form-control" required="required" name="data" value="<?=$despesa->data?>">
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input type="number" class="form-control" required="required" name="valor" value="<?=$despesa->valor?>">
            </div>
            <div class="form-group">
                <label>Tipo</label><br>
                <select name="tipo">
                    <?php 
                    $dg = ($despesa->tipo == "Despesa Geral")? "selected='selected'" : "";
                    $dcf = ($despesa->tipo == "Despesa Com Funcionário")? "selected='selected'" : "";
                    ?> 
                    <option value="Despesa geral" <?=$dg?>>Despesa Geral</option>
                    <option value="Despesa com Funcionário" <?=$dcf?>>Despesa com Funcionário</option>
                </select>
            </div>
            <div class="form-group">
                <label>Situação</label><br>
                <select name="situacao">
                    <?php 
                    $pago = ($despesa->situacao == "Pago")? "selected='selected'" : "";
                    $nao_pago = ($despesa->situacao == "Não Pago")? "selected='selected'" : "";
                    ?> 
                    <option value="Pago" <?=$pago?>>Pago</option>
                    <option value="Não Pago" <?=$nao_pago?>>Não Pago</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?=$id?>">
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


