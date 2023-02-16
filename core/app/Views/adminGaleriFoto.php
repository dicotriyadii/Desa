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
            <h1>Galeri Foto</h1>
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
                <a href="<?= base_url()?>/formGaleri" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Foto</a>
                <a href="#"data-toggle="modal" data-target="#modalTambahVideo" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Video</a><br><br>
                <a href="<?=base_url()?>/downloadTataCaraUploadVideo">Klik Disini Untuk Melihat Tata Cara upload Video</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
                    <th>Petugas</th>
                    <th>Status</th>
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
                    <td><?= $d['namaGambar']?></td>
                    <?php
                    if($d['gambar'] == "video"){?>
                        <td>Video</td>  
                    <?php
                    }else{?>
                        <td><img src="../galeri/<?= $d['gambar'] ?>" style="width:50px;heigth:50px;"></td>
                    <?php
                    }
                    ?>
                    <td><?= $d['keterangan']?></td>
                    <td><?= $d['posted']?></td>
                    <?php
                    if($d['status'] == 'Sudah Validasi'){?>
                      <td><span style="color:green">Sudah Validasi</span></td>
                    <?php
                    }else if($d['status'] == 'Belum Validasi'){?>
                      <td><span style="color:red">Belum Validasi</span></td>
                    <?php
                    } 
                    ?>
                    <td>
                    <?php
                      if($session->get('hakAkses') == "superAdmin"){?>
                        <a href="<?=base_url()?>/belumValidasiGaleri/<?= $d['idGaleri']?>" style="color:red;">Belum Validasi</a><br>
                        <a href="<?=base_url()?>/sudahValidasiGaleri/<?= $d['idGaleri']?>" style="color:green;">Sudah Validasi</a><br>                        
                      <?php
                      }
                      ?>
                      <a href="<?=base_url()?>/editGaleri/<?= $d['idGaleri']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusGaleri/<?= $d['idGaleri']?>" style="color:red;">Hapus</a>
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
<!-- #modal -->
<div class="modal fade" id="modalTambahVideo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesGaleriVideo" method="POST"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlInput1">Judul Video</label><br>
            <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Link Embed Video</label><br>
            <textarea name="video" class="form-control"></textarea>
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