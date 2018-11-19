<?php include_once"header.php" ?>
<?php

include_once "../../../php/classDentista.php";
include_once "../../../php/classEspecialidade.php";
include_once "../../../php/classDentistaHasEspecialidade.php";

$f = new funcionario();
$d = new Dentista();
$e = new Especialidade();
$dhe = new Dentista_has_Especialidade();

$flag = 0;

if(isset($_POST['botao'])){ 

    $dentista_id = $_POST['dentista_id'];
    $especialidade_atual = $_POST['especialidade_atual'];
    $nome_dentista = $_POST['nome_dentista'];
    $cro_dentista = $_POST['cro_dentista'];
    $especialidade = $_POST['especialidade'];

    $d->setFuncionarioId($dentista_id);
    $d->setCro($cro_dentista);
    var_dump($d->edit());

    $f->setNome($nome_dentista);
    $f->setId($dentista_id);
    var_dump($f->editNome());

    $dhe->setDentistaId($dentista_id);
    $dhe->setEspecialidadeNome($especialidade_atual);
    var_dump($dhe->edit($dentista_id, $especialidade));

    //header("Location: ../especialidades-dentistas.php");

}else{
    $dentista_id = $_GET['dentista_id'];
    $especialidade_nome = $_GET['especialidade_nome'];

    $dhe->setDentistaId($dentista_id);
    $dhe->setEspecialidadeNome($especialidade_nome);
    $esp_den = $dhe->viewDentistaHasEspecialidade();

    $dentista_id = $esp_den->dentista_id;
    $d->setFuncionarioId($dentista_id);
    $dentista = $d->viewDentista();
    $cro_dentista = $dentista->cro;

    $f->setId($dentista_id);
    $funcionario = $f->viewFuncionario();
    $nome_dentista = $funcionario->nome;
}
?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Atualização de Especialidade para Dentista
        </div>
        <div class="card-body">
          <form action="editar-especialidade-dentista.php" method="post">
            <div class="form-group">
                <label>Nome do Dentista</label>
                <input type="text" class="form-control" required="required" name="nome_dentista" value="<?= $nome_dentista ?>">
            </div>
            <div class="form-group">
                <label>CRO do Dentista</label>
                <input type="text" class="form-control" maxlength="5" name="cro_dentista" value="<?= $cro_dentista ?>">
            </div>
            <div class="form-group">
                <label>Especialidade</label><br>
                <select name="especialidade">
                <?php 
                include_once "../../../php/classEspecialidade.php";
                $e = new Especialidade();
                $stmt = $e->viewAll();

                while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                <?php $selected  = ($row->nome == $especialidade_nome)? "selected='selected'" : "" ?>
                <option value= "<?= $row->nome; ?>"<?=$selected?>> <?= $row->nome; ?> </option>
                <?php } ?>
                </select>
            </div>
            <input type="hidden" name="dentista_id" value="<?=$dentista_id?>">
            <input type="hidden" name="especialidade_atual" value="<?=$especialidade_nome?>">
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


