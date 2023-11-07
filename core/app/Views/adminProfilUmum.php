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
              <h1>Profil Umum</h1>
                <?php
                if($dataTataGunaLahan == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilTataGunaLahan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Profil Tata Guna Lahan</a>
                <?php
                }
                ?>
                <?php
                if($dataProduksi == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilProduksi" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Profil Produksi</a>
                <?php
                }
                ?>
              </div>
              <div class="modal fade" id="modalProfilTataGunaLahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Tata Guna Lahan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesTambahProfilTataGunaLahan" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Jenis Lahan</label><br>
                              <input type="text" class="form-control" name="jenisLahan" placeholder="Masukkan Tahun" required>
                              <label for="exampleFormControlInput1">Jumlah</label><br>
                              <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Tahun Pembentukan" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Tambah Profil Tata Guna Lahan</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div class="card-body">
                <h3>Tata Guna Lahan</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Lahan</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataTataGunaLahan as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisLahan']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilTataGunaLahan" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilTataGunaLahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Tata Guna Lahan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilTataGunaLahan" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Lahan</label><br>
                                <input type="text" class="form-control" name="jenisLahan" value="<?= $d['jenisLahan']?>" required>
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
              <div class="modal fade" id="modalProfilProduksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Produksi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesTambahProfilProduksi" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Jenis Produksi</label><br>
                              <input type="text" class="form-control" name="jenisProduksi" placeholder="Masukkan Jenis Produksi" required>
                              <label for="exampleFormControlInput1">Nama Produksi</label><br>
                              <input type="text" class="form-control" name="namaProduksi" placeholder="Masukkan Nama Produksi" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Tambah Profil Produksi</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div class="card-body">
                <h3>Produksi</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Produksi</th>
                    <th>Nama Produksi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataProduksi as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisProduksi']?></td>
                    <td><?=$d['namaProduksi']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilProduksi" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilProduksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Produksi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilProduksi" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis Produksi</label><br>
                                <input type="text" class="form-control" name="jenisProduksi" value="<?= $d['jenisProduksi']?>" required>
                                <label for="exampleFormControlInput1">Nama Produksi</label><br>
                                <input type="text" class="form-control" name="namaProduksi" value="<?= $d['namaProduksi']?>" required>
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