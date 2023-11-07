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
            <h1>Potensi Unggulan</h1>
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
                  <a href=""data-toggle="modal" data-target="#modalTambah" style="border: 0px solid black; padding:10px; margin:0 0 5px 0; border-radius:5px; background-color:gray; color:white;">Tambah Potensi</a>
                </div>
            </div>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Potensi</th>
                    <th>Nama Potensi</th>
                    <th>Alamat Potensi</th>
                    <th>Helpdesk</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($data as $d){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no?></td>
                    <td><?= $d['jenisPotensi']?></td>
                    <td><?= $d['namaPotensi']?></td>
                    <td><?= $d['alamatPotensi']?></td>
                    <td><?= $d['helpdesk']?></td>
                    <td><img src="potensi/<?= $d['gambar'] ?>"style="width:100px;heigth:100px;"></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEdit<?= $d['idPotensi']?>" style="color:green;">Edit</a><br>
                      <!-- Modal -->
                      <div class="modal fade" id="modalEdit<?=$d['idPotensi']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Potensi Unggulan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form class="form-horizontal" action="ProsesEditTambahPotensi" method="POST"  enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Jenis Potensi</label><br>
                                  <select class="form-control" name="jenisPotensi" required>
                                  <?php
                                  foreach($dataJenisPotensi as $djp){?>
                                  <option value=<?=$djp['idJenisPotensi']?>><?=$djp['jenisPotensi']?></option>
                                  <?php
                                  }
                                  ?>
                                  </select>
                                  <input type="text" name="idPotensi" value="<?= $d['idPotensi']?>" hidden required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Potensi</label><br>
                                  <input type="text" class="form-control" name="namaPotensi" value="<?= $d['namaPotensi']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Alamat</label><br>
                                  <input type="text" class="form-control" name="alamat" value="<?= $d['alamatPotensi']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Helpdesk</label><br>
                                  <input type="text" class="form-control" name="helpdesk" value="<?= $d['helpdesk']?>" required>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Gambar</label><br>
                                  <input type="file" name="gambar">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <a href="<?=base_url()?>/hapusPotensi/<?= $d['idPotensi']?>" style="color:red;">Hapus</a><br>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal" action="ProsesTambahPotensi" method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlInput1">Jenis Potensi</label><br>
            <select class="form-control" name="jenisPotensi" required>
              <option>- Silahkan Pilih Jenis Potensi -</option>
              <?php
              foreach($dataJenisPotensi as $djp){?>
              <option value=<?=$djp['idJenisPotensi']?>><?=$djp['jenisPotensi']?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Potensi</label><br>
            <input type="text" class="form-control" name="namaPotensi" placeholder="Masukkan Nama Potensi">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Alamat</label><br>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Helpdesk</label><br>
            <input type="number" class="form-control" name="helpdesk" placeholder="Masukkan Helpdesk">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Gambar</label><br>
            <input type="file" name="gambar" required>
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