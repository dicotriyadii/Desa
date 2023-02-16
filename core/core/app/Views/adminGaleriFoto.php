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
                    <td><img src="../galeri/<?= $d['gambar'] ?>" style="width:100px;heigth:100px;"></td>
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

<?php
  require('AFooter.php');
?>  