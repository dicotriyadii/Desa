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
            <h1>Galeri</h1>
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
              <!-- /.card-header -->
              <div class="card-footer" style="text-align:left; margin-top:15px;background-color:white;">
                <a href="#"data-toggle="modal" data-target="#modalTambahVideo" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Galeri</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>jenis</th>
                    <th>Status</th>
                    <th>link</th>
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
                    <td><?= $no; ?></td>
                    <td><?= $d['judul']?></td>
                    <td><?= $d['jenis']?></td>
                    <?php
                    if($d['status'] == 'Sudah Validasi'){?>
                      <td><span style="color:green">Sudah Validasi</span></td>
                    <?php
                    }else if($d['status'] == 'Belum Validasi'){?>
                      <td><span style="color:red">Belum Validasi</span></td>
                    <?php
                    } 
                    ?>
                    <td><img src="galeri/<?= $d['link'] ?>" style="width:100px;heigth:100px;"></td>
                    <td>
                      <a href="<?=base_url()?>/belumValidasiGaleri/<?= $d['idGaleri']?>" style="color:red;">Belum Validasi</a><br>
                      <a href="<?=base_url()?>/sudahValidasiGaleri/<?= $d['idGaleri']?>" style="color:green;">Sudah Validasi</a><br>                        
                      <a href="" data-toggle="modal" data-target="#edit<?=$d['idGaleri']?>"  style="color:gray;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusGaleri/<?= $d['idGaleri']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                    <!-- Modal -->
                  <div class="modal fade" id="edit<?=$d['idGaleri']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" action="ProsesEditGaleri" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="text" name="idGaleri" class="form-control" value="<?=$d['idGaleri']?>" hidden>
                            <label for="exampleFormControlInput1">Jenis Galeri</label>
                            <select name="jenis"  class="form-control">
                              <option value="<?=$d['jenis']?>"> <?=$d['jenis']?> </option>
                              <option value="gambar"> Gambar </option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput1">Judul</label><br>
                            <input type="text" name="judul" class="form-control" value="<?=$d['judul']?>" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Upload Gambar</label><br><span style="color:red;"> * di isi jika upload galeri</span><br>
                            <input type="file" name="gambar">
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                    </div>
                  </div>
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
<!-- #modal -->
<div class="modal fade" id="modalTambahVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Galeri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesGaleri" method="POST"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlInput1">Jenis Galeri</label>
            <select name="jenis"  class="form-control">
              <option> - Silahkan Pilih Jenis Galeri - </option>
              <option value="gambar"> Gambar </option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Judul</label><br>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required>
          </div>
          <div class="form-group">
            <input type="file" name="gambar">
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