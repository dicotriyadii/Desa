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
              <h1>Profil Sarana Kelembagaan dan Adat</h1>
                <?php
                if($dataKemasyarakatan == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilKelembagaan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Kelembagaan</a>
                <?php
                }
                if($dataAdat == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilAdat" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Adat</a>
                <?php
                }
                ?>
              </div>
              <!-- Kelembagaan -->
              <div class="modal fade" id="modalProfilKelembagaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Kelembagaan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilKelembagaan" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Lembaga</label><br>
                          <input type="text" class="form-control" name="jenisLembaga" placeholder="Masukkan Jenis Lembaga" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                          <label for="exampleFormControlInput1">Pengurus</label><br>
                          <input type="text" class="form-control" name="pengurus" placeholder="Masukkan Pengurus" required>
                          <label for="exampleFormControlInput1">Kegiatan</label><br>
                          <input type="text" class="form-control" name="kegiatan" placeholder="Masukkan kegiatan" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Kelembagaan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Kelembagaan</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Lembaga</th>
                    <th>Jumlah</th>
                    <th>Pengurus</th>
                    <th>Kegiatan</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataKemasyarakatan as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisLembaga']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td><?=$d['pengurus']?></td>
                    <td><?=$d['kegiatan']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilKelembagaan" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilKelembagaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Kelembagaan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilKelembagaan" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Lembaga</label><br>
                                <input type="text" class="form-control" name="jenisLembaga" value="<?= $d['jenisLembaga']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
                                <label for="exampleFormControlInput1">Pengurus</label><br>
                                <input type="text" class="form-control" name="pengurus" value="<?= $d['pengurus']?>" required>
                                <label for="exampleFormControlInput1">Kegiatan</label><br>
                                <input type="text" class="form-control" name="kegiatan" value="<?= $d['kegiatan']?>" required>
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
              <!-- Adat -->
              <div class="modal fade" id="modalProfilAdat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Adat</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilAdat" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Lembaga Adat</label><br>
                          <input type="text" class="form-control" name="jenisLembagaAdat" placeholder="Masukkan Jenis Lembaga Adat" required>
                          <label for="exampleFormControlInput1">Status</label><br>
                          <input type="text" class="form-control" name="status" placeholder="Masukkan Jumlah status" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Adat</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Adat</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Lembaga Adat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataAdat as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisLembagaAdat']?></td>
                    <td><?=$d['status']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilAdat" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilAdat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Adat</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilAdat" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis Lembaga Adat</label><br>
                                <input type="text" class="form-control" name="jenisLembagaAdat" value="<?= $d['jenisLembagaAdat']?>" required>
                                <label for="exampleFormControlInput1">Status</label><br>
                                <input type="text" class="form-control" name="status" value="<?= $d['status']?>" required>
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