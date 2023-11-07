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
              <h1>Profil Rawan Bencana</h1>
                <?php
                if($dataRawanBencana == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilRawanBencana" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Profil Rawan Bencana</a>
                <?php
                }
                ?>
                <?php
                if($dataOrbitasi == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilOrbitasi" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Profil Orbitasi</a>
                <?php
                }
                ?>
              </div>
              <div class="modal fade" id="modalProfilRawanBencana" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Rawan Bencana</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesTambahProfilRawanBencana" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Jenis Bencana</label><br>
                              <input type="text" class="form-control" name="jenisBencana" placeholder="Masukkan Jenis Bencana" required>
                              <label for="exampleFormControlInput1">Jumlah</label><br>
                              <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Tambah Profil Rawan Bencana</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div class="card-body">
                <h3>Rawan Bencana</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Bencana</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataRawanBencana as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisBencana']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilRawanBencana" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilRawanBencana" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Rawan Bencana</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilRawanBencana" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Bencana</label><br>
                                <input type="text" class="form-control" name="jenisBencana" value="<?= $d['jenisBencana']?>" required>
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
              <div class="modal fade" id="modalProfilOrbitasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Orbitasi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesTambahProfilOrbitasi" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Jenis Sarana</label><br>
                              <input type="text" class="form-control" name="jenisSarana" placeholder="Masukkan Jenis Sarana" required>
                              <label for="exampleFormControlInput1">Status</label><br>
                              <input type="text" class="form-control" name="status" placeholder="Masukkan Status" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Tambah Profil Orbitasi</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div class="card-body">
                <h3>Orbitasi</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Sarana</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataOrbitasi as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisSarana']?></td>
                    <td><?=$d['status']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilOrbitasi" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilOrbitasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Orbitasi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilOrbitasi" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis Sarana</label><br>
                                <input type="text" class="form-control" name="jenisSarana" value="<?= $d['jenisSarana']?>" required>
                                <label for="exampleFormControlInput1">status</label><br>
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