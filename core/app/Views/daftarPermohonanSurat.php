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
            <h1>Daftar Permohonan</h1>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Permohonan</th>
                    <th>Nomor Induk Kependudukan</th>
                    <th>Tanggal Permohonan</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                      foreach($dataPermohonan as $d) {
                      $no++;
                    ?>
                  <tr>
                    <td><?= $no;?></td>
                    <td><?=$d['jenisPermohonan']?></td>
                    <td><?=$d['nomorIndukKependudukan']?></td>
                    <td><?=$d['tanggalPermohonan']?></td>
                    <td><?=$d['keterangan']?></td>
                    <td>
                        <?php
                        if($d['status'] == "Belum Proses"){?>
                        <div style="color:gray;">Belum Proses</div>    
                        <?php
                        }else if(($d['status'] == "Sedang Proses")){?>
                        <div style="color:orange;">Sedang Dalam Proses</div>
                        <?php
                        }else if(($d['status'] == "Selesai")){?>
                        <div style="color:green;">Selesai</div>
                        <a href="<?=base_url()?>/downloadSurat/<?=$d['idPermohonan']?>">Download Surat</a>
                        <?php
                        }
                        ?>
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