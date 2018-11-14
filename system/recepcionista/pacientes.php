<?php include_once'header.php' ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">

            <div>
              <button class="btn btn-primary btn-block" onclick="window.location.href='paciente-registro.php'" name="cadastrar-paciente">Cadastrar Paciente</button>
            </div>

            <div class="card-header">
              <i class="fas fa-table"></i>
              Pacientes</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Sobrenome</th>
                      <th>Data de nascimento</th>
                      <th>CPF</th>
                      <th>Plano Dentário</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nome</th>
                      <th>Sobrenome</th>
                      <th>Data de nascimento</th>
                      <th>CPF</th>
                      <th>Plano Dentário</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php 
                      include_once '../../php/classPaciente.php';

                      $p = new Paciente();

                      $stmt = $p->viewAll();

                      while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                      <tr>
                        <td> <?= $row->nome; ?> </td>
                        <td> <?= $row->sobrenome; ?> </td>
                        <td> <?= $row->nascimento; ?> </td>
                        <td> <?= empty($row->cpf)? "" : $row->cpf; ?> </td>
                        <td> <?= empty($row->plano_dentario)? "" : $row->plano_dentario; ?> </td>
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

<?php include_once'footer.php' ?>
