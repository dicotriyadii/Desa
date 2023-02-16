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
            <h1>Artikel</h1>
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
                <a href="<?= base_url()?>/formArtikel" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Artikel</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Artikel</th>
                    <th>Tanggal</th>
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
                    <td><?=$d['judulArtikel']?></td>
                    <td><?=$d['tanggalArtikel']?></td>
                    <td><?=$d['keterangan']?></td>
                    <td><img src="../artikel/<?= $d['gambarArtikel'] ?>" style="width:100px;heigth:100px;"></td>
                    <td><?=$d['authorArtikel']?></td>
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
                        <a href="<?=base_url()?>/belumValidasiArtikel/<?= $d['idArtikel']?>" style="color:red;">Belum Validasi</a><br>
                        <a href="<?=base_url()?>/sudahValidasiArtikel/<?= $d['idArtikel']?>" style="color:green;">Sudah Validasi</a><br>                        
                      <?php
                      }
                      ?>
                      <a href="<?=base_url()?>/editArtikel/<?= $d['idArtikel']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusArtikel/<?= $d['idArtikel']?>" style="color:red;">Hapus</a>
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