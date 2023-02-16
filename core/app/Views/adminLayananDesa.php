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
            <h1>Layanan Desa</h1>
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
                    <th>Action</th>
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
                        <?php
                        }else if(($d['status'] == "Ditolak")){?>
                        <div style="color:red;">Ditolak</div>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                      <?php
                      if($d['status'] == "Selesai" || $d['status'] == "Ditolak"){?>
                      <p>Permohonan Telah Selesai</p>
                      <?php
                      }else{?>
                      <!-- <a href="<?=base_url()?>/downloadBerkasPermohonan/<?= $d['idPermohonan']?>" style="color:grey;">Lihat Berkas</a><br> -->
                      <a href=""data-toggle="modal" data-target="#modal<?= $d['idPermohonan']; ?>">Upload Surat</a><br>
                      <a href="<?=base_url()?>/updateStatusTolak/<?= $d['idPermohonan']?>" style="color:red;">Ditolak</a>
                      <!-- #modal -->
                      <div class="modal fade" id="modal<?= $d['idPermohonan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload Surat Yang Sudah di Tanda Tangani</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form class="form-horizontal" action="ProsesUploadSurat" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Upload Surat</label><br>
                                <input type="file" name="file">
                                <input type="text" value="<?=$d['nomorIndukKependudukan']?>" hidden name="nomorIndukKependudukan">
                                <input type="text" value="<?=$d['jenisPermohonan']?>" hidden name="jenisPermohonan">
                                <input type="text" value="<?=$d['idPermohonan']?>" hidden name="idPermohonan">
                              </div>
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