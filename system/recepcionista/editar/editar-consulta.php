<?php include_once"header.php" ?>
<?php

$flag = 0;

include_once "../../../php/classDentistaConsultaPaciente.php";
include_once "../../../php/classPaciente.php";
include_once "../../../php/classDentista.php";

$p = new Paciente();
$d = new Dentista();
$f = new Funcionario();
$dcp = new Dentista_consulta_Paciente();

if(isset($_POST['botao'])){ 

    $id = $_POST['id'];
    $paciente_id = $_POST['paciente_id'];
    $dentista_id = $_POST['dentista_id'];
    $nome_dentista = $_POST['nome_dentista'];
    $cro_dentista = $_POST['cro_dentista'];
    $nome_paciente = $_POST['nome_paciente'];
    $cpf_paciente = $_POST['cpf_paciente'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $situacao = $_POST['situacao'];
    $operacao = $_POST['operacao'];

    if(!$p->validaCPF($cpf_paciente)) $flag = 1;

    $dcp->setDentistaId($dentista_id);
    $dcp->setData($data);
    $dcp->setHorario($horario);

    if(!$dcp->horarioValido()){
        $flag = 2;
    }

    if(!$d->existeNomeCro($nome_dentista, $cro_dentista)){
        $flag = 3;
    }

    $p->setNome($nome_paciente);
    $p->setCpf($cpf_paciente);

    if(!$p->existeNomeCpf()){
        $flag = 4;
    }

    if($flag == 0){
        $dcp->setId($id);
        $dcp->setPacienteId($paciente_id);
        $dcp->setValor($valor);
        $dcp->setSituacao($situacao);
        $dcp->setOperacao($operacao);
        $dcp->edit();
        header("Location: ../consultas.php");
    }
}else{
    $id = $_GET['id'];

    $dcp->setId($id);
    $consulta = $dcp->viewConsulta();
    $valor = $consulta->valor;
    $data = $consulta->data;
    $horario = $consulta->horario;
    $situacao = $consulta->situacao;
    $operacao = $consulta->operacao;

    $dentista_id = $consulta->dentista_id;
    $d->setFuncionarioId($dentista_id);
    $dentista = $d->viewDentista();
    $cro_dentista = $dentista->cro;

    $paciente_id = $consulta->paciente_id;
    $p->setId($paciente_id);
    $paciente = $p->viewPaciente();
    $nome_paciente = $paciente->nome;
    $cpf_paciente = $paciente->cpf;

    $f->setId($dentista_id);
    $funcionario = $f->viewFuncionario();
    $nome_dentista = $funcionario->nome;
}
?>
  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">
          Atualização de Consulta
        </div>
        <div class="card-body">
        <?php if($flag == 1){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>O CPF informado não é válido</b>
          </div>
        <?php } elseif($flag == 2){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>Já há uma pessoa agendada</b>
          </div>
        <?php } elseif($flag == 3){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>Não há esse dentista cadastrado</b>
          </div>
        <?php } elseif($flag == 4){ ?>
          <div class="alert alert-danger form-group" role="alert">
            <b>Não há esse paciente cadastrado</b>
          </div>
        <?php } ?>
          <form action="editar-consulta.php" method="post">
            <div class="form-group">
                <label>Operação</label>
                <input type="text" class="form-control" required="required" autofocus="autofocus" name="operacao" value="<?= $operacao ?>">
            </div>
            <div class="form-group">
                <label>Nome do Paciente</label>
                <input type="text" class="form-control" name="nome_paciente" value="<?= $nome_paciente ?>">
            </div>
            <div class="form-group">
                <label>CPF do Paciente</label>
                <input type="text" class="form-control" maxlength="11" name="cpf_paciente" value="<?= $cpf_paciente ?>">
            </div>
            <div class="form-group">
                <label>Nome do Dentista</label>
                <input type="text" class="form-control" required="required" name="nome_dentista" value="<?= $nome_dentista ?>">
            </div>
            <div class="form-group">
                <label>CRO do Dentista</label>
                <input type="text" class="form-control" maxlength="5" name="cro_dentista" value="<?= $cro_dentista  ?>">
            </div>
            <div class="form-group">
                <label>Data</label>
                <input type="date" class="form-control" required="required" name="data" value="<?= $data ?>">
            </div>
            <div class="form-group">
                <label>Horário</label>
                <input type="time" class="form-control" required="required" autofocus="autofocus" name="horario" value="<?= $horario ?>">
            </div>
            <div class="form-group">
                <label>Valor</label>
                <input type="number" class="form-control" required="required" autofocus="autofocus" name="valor" value="<?= $valor ?>">
            </div>
            <div class="form-group">
                <label>Situação</label><br>
                <select name="situacao">
                    <?php 
                        $pago = ($situacao == "Pago")? "selected='selected'" : "";
                        $nao_pago = ($situacao == "Não Pago")? "selected='selected'" : "";
                    ?>
                    <option value="Pago" <?=$pago?>>Pago</option>
                    <option value="Não Pago" <?=$nao_pago?>>Não Pago</option>
                </select>
            </div>
            <input type="hidden" name="dentista_id" value="<?=$dentista_id?>">
            <input type="hidden" name="paciente_id" value="<?=$paciente_id?>">
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


