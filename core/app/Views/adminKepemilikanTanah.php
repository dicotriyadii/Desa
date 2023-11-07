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
          <div class="col-sm-6">
            <h1>Manajemen Kepemilikan Tanah</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <a href=""data-toggle="modal" data-target="#modalTambah" style="border: 0px solid black; padding:10px; margin:0 0 5px 0; border-radius:5px; background-color:gray; color:white;">Tambah Kepemilikan Tanah</a>
                </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Nama Pemilik Sebelumnya</th>
                    <th>Nama Pemilik Sekarang</th>
                    <th>Luas tanah</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataKepemilikanTanah as $dkt){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no?></td>
                    <td><?= $dkt['nomorSurat']?></td>
                    <td><?= $dkt['pemilikSebelumnya']?></td>
                    <td><?= $dkt['pemilikSekarang']?></td>
                    <td><?= $dkt['luasTanah']?></td>
                    <td><?= $dkt['alamat']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEdit<?= $dkt['idPemilikTanah']?>" style="color:green;">Edit</a><br>
                      <!-- Modal -->
                      <div class="modal fade" id="modalEdit<?=$dkt['idPemilikTanah']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Kepemilikan Tanah</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form class="form-horizontal" action="ProsesEditTambahPemilikTanah" method="POST"  enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nomor Surat</label><br>
                                  <input type="text" class="form-control" name="nomorSurat" value="<?= $dkt['nomorSurat']?>" required>
                                  <input type="text" class="form-control" name="idPemilikTanah" value="<?= $dkt['idPemilikTanah']?>" hidden>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Tanggal Surat</label><br>
                                  <input type="date" class="form-control" name="tanggalSurat" value="<?= $dkt['tanggalSurat']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Pemilik Sebelumnya</label><br>
                                  <input type="text" class="form-control" name="namaPemilikSebelumnya" value="<?= $dkt['pemilikSebelumnya']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Pemilik Sekarang</label><br>
                                  <input type="text" class="form-control" name="namaPemilikSekarang" value="<?= $dkt['pemilikSekarang']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Luas</label><br>
                                  <input type="text" class="form-control" name="luasTanah" value="<?= $dkt['luasTanah']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Alamat</label><br>
                                  <input type="text" class="form-control" name="alamat" value="<?= $dkt['alamat']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Upload Berkas</label><br>
                                  <input type="file" name="berkas">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <a href="<?=base_url()?>/hapusPemilikTanah/<?= $dkt['idPemilikTanah']?>" style="color:red;">Hapus</a><br>
                      <a href="<?=base_url()?>/downloadBerkasPemilikTanah/<?= $dkt['idPemilikTanah']?>" style="color:green;">Download</a><br>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
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
<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kepemilikan Tanah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="ProsesTambahPemilikTanah" method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nomor Surat</label><br>
            <input type="text" class="form-control" name="nomorSurat" placeholder="Silahkan Masukkan Nomor Surat" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Tanggal Surat</label><br>
            <input type="date" class="form-control" name="tanggalSurat" required>
          </div>
         <div class="form-group">
            <label for="exampleFormControlInput1">Nama Pemilik Sebelumnya</label><br>
            <input type="text" class="form-control" name="namaPemilikSebelumnya" placeholder="Silahkan Masukkan Nama Pemilik Sebelumnya" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Pemilik Sekarang</label><br>
            <input type="text" class="form-control" name="namaPemilikSekarang" placeholder="Silahkan Masukkan Nama Pemilik Sekarang" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Luas</label><br>
            <input type="text" class="form-control" name="luasTanah" placeholder="Silahkan Masukkan Luas" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat</label><br>
            <input type="text" class="form-control" name="alamat" placeholder="Silahkan Masukkan Luas" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Upload Berkas</label><br>
            <input type="file" name="berkas">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
  require('AFooter.php');
?>  