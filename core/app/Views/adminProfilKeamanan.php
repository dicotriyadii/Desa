<?php
  require('AHeader.php');
  $status = $session->get('status');
  if($status != 'login'){
    return redirect()->to(base_url().'/login');
  }
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-footer" style="text-align:left;background-color:white;margin-top:25px;">
              <h1>Profil Keamanan</h1>
                <?php
                if($dataKeamanan == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilKeamanan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Keamanan</a>
                <?php
                }
                ?>
              </div>
              <!-- Keamanan -->
              <div class="modal fade" id="modalProfilKeamanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Keamanan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilKeamanan" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Keamanan</label><br>
                          <input type="text" class="form-control" name="keamanan" placeholder="Masukkan Jenis Lembaga" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Keamanan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Keamanan</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Keamanan</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataKeamanan as $d){
                    ?>
                  <tr>
                    <td><?=$d['keamanan']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilKeamanan" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilKeamanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Keamanan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilKeamanan" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Keamanan</label><br>
                                <input type="text" class="form-control" name="keamanan" value="<?= $d['keamanan']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Edit Data</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php
  require('AFooter.php');
?>  