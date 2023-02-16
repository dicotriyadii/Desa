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
            <h1>Berita</h1>
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
                <a href="<?= base_url()?>/formBerita" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Berita</a>
                <a href="<?= base_url()?>/adminKategori" style="background-color:gray;padding:8px 10px;border-radius:10px;color:white;">Pengaturan Kategori</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Berita</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
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
                    <td><?=$no;?></td>
                    <td><?=$d['judulBerita']?></td>
                    <td><?=$d['tanggalBerita']?></td>
                    <td><?=$d['keterangan']?></td>
                    <td><img src="../berita/<?= $d['gambarBerita'] ?>" style="width:100px;heigth:100px;"></td>
                    <td><?=$d['authorBerita']?></td>
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
                        <a href="<?=base_url()?>/belumValidasiBerita/<?= $d['idBerita']?>" style="color:red;">Belum Validasi</a><br>
                        <a href="<?=base_url()?>/sudahValidasiBerita/<?= $d['idBerita']?>" style="color:green;">Sudah Validasi</a><br>                        
                      <?php
                      }
                      ?>
                      <a href="<?=base_url()?>/editBerita/<?= $d['idBerita']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusBerita/<?= $d['idBerita']?>" style="color:red;">Hapus</a>
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