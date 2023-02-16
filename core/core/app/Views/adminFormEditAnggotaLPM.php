<?php
  require('AEditHeader.php');
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
            <h1>Perubahan data Anggota LPM</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
          <form class="form-horizontal" action="../ProsesEditAnggotaLPM" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Anggota<span style="color:red;">*</span></span></label>
                    <input type="text" name="namaAnggota" class="form-control" id="exampleInputEmail1" value="<?= $d['namaAnggota']?>">
                    <input type="text" name="idAnggotaLPM" value="<?= $d['idAnggotaLPM'];?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
                    <textarea name="keteranganAnggotaLPM" class="form-control" style="width:100%;height:150px;"><?= $d['keterangan']?></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan<span style="color:red;">*</span></label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan">
                      <option value="<?= $d['jabatan']?>"> <?= $d['jabatan']?> </option>
                      <option value="Ketua">Ketua</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Bendahara">Bendahara</option>
                      <option value="Seksi Agama">Seksi Agama</option>
                      <option value="Seksi Hukum">Seksi Hukum</option>
                      <option value="Seksi SDM">Seksi SDM</option>
                      <option value="Seksi Kesehatan, KB dan Penduduk">Seksi Kesehatan, KB dan Penduduk</option>
                      <option value="Seksi Pembangunan Ekonomi dan Koperasi">Seksi Pembangunan Ekonomi dan Koperasi</option>
                      <option value="Seksi Kesejahteraan Sosial">Seksi Kesejahteraan Sosial</option>
                      <option value="Seksi Pemuda, Olahraga dan Seni Budaya">Seksi Pemuda, Olahraga dan Seni Budaya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Foto<span style="color:red;">*</span></span></label><br>
                    <input type="file" name="foto" required>
                </div>

                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
          <div class="card-footer" style="text-align:right;">
            <button type="submit" class="btn btn-primary" style="background-color:red; border-color: red;">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <?php
          }
          ?>
          </form>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php
  require('AEditFooter.php');
?>  