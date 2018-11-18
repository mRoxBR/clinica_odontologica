<?php include_once'header.php' ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">

            <div>
              <button class="btn btn-primary btn-block" onclick="window.location.href='cadastrar/cadastrar-especialidade-dentista.php'" name="cadastrar-especialidade-dentista">Cadastrar Especialidade para Dentista</button>
            </div>

            <div class="card-header">
              <i class="fas fa-table"></i>
              Especialidades por Dentista</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>Dentista</th>
                      <th>Especialidade</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr align="center">
                      <th>Dentista</th>
                      <th>Especialidade</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php 
                      include_once '/../../php/classDentistaHasEspecialidade.php';

                      $dhe = new Dentista_has_Especialidade();

                      $stmt = $dhe->viewAll();

                      while($row = $stmt->fetch(PDO::FETCH_OBJ)){ ?>
                      <tr align="center">
                        <td> <?= $row->dentista_id; ?> </td>
                        <td> <?= $row->especialidade_nome; ?> </td>
                        <td><a href="editar/editar-especialidade-dentista.php?dentista_id=<?=$row->dentista_id?>&especialidade_nome=<?=$row->especialidade_nome?>" class="btn btn-primary">Alterar</a></td>
                        <td><a href="#" class="btn btn-danger" data-toggle="modal" data-target="#removeModal">Remover</a></td>
                      </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-wrapper -->
      <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Você tem certeza que deseja remover?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Essa ação não poderá ser desfeita</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
              <a class="btn btn-primary" href="#">Remover</a>
            </div>
          </div>
        </div>
      </div>
<?php include_once'footer.php' ?>
