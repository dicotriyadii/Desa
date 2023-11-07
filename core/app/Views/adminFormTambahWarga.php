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
            <h1>Form Tambah Warga Desa</h1>
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
          <form class="form-horizontal" action="ProsesUploadCSV" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload data warga dari exel </label><br>
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
          </div>
          </form>
          <a href="<?= base_url()?>/downloadFormatCSV"><div>Klik disini untuk tata cara pengisian data pada format exel</div></a>
          <a href="<?= base_url()?>/downloadContohFormat"><div>Klik disini untuk format Exel</div></a>
        </div>
        <div class="card card-default">
          <div class="card-body">
          <form class="form-horizontal" action="ProsesTambahWarga" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Induk Kependudukan (NIK) <span style="color:red;">*</span></label>
                    <input type="number"   name="noKTP" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Induk Kependudukan" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap <span style="color:red;">*</span></span></label>
                    <input type="text" name="namaWarga" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Lengkap" required> 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir <span style="color:red;">*</span></label>
                    <input type="text"  name="tempatLahir" class="form-control"  id="exampleInputEmail1" placeholder="Masukkan Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label>Agama <span style="color:red;">*</span></label>
                    <select name="agama"  class="form-control selectpicker" data-live-search="true" required onkeyup="this.value = this.value.toUpperCase()">
                      <option> - Silahkan Pilih Agama - </option>
                      <?php
                      foreach($dataAgama as $da){
                      ?>
                      <option><?=$da['jenisAgama']?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pendidikan Terakhir <span style="color:red;">*</span></label>
                    <select name="pendidikanTerakhir"  class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option> - Silahkan Pilih Pendidikan Terakhir - </option>
                      <?php
                      foreach($dataPendidikanTerakhir as $dpt){
                      ?>
                      <option><?=$dpt['jenisPendidikan']?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                <label>Pekerjaan <span style="color:red;">*</span></label>
                    <select name="pekerjaan"  class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option> - Silahkan Pilih Pekerjaan -</option>
                      <?php
                      foreach($data as $d){?>
                        <option><?= $d['namaPekerjaan']?></option>
                      <?php 
                      } 
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">BPJS <span style="color:red;">*</span></label>
                    <input type="number" name="bpjs" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor BPJS" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat" required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RT<span style="color:red;">*</span></label>
                    <input type="text" name="RT" class="form-control" id="exampleInputEmail1" placeholder="Masukkan RT" required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon <span style="color:red;">*</span></label>
                    <input type="number"   name="noTelp" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Telepon" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Kartu Keluarga <span style="color:red;">*</span></label>
                    <input type="number"  name="nomorKartuKeluarga" class="form-control" id="exampleInputEmail1" placeholder="Nomor Kartu Keluarga" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin <span style="color:red;">*</span></label>
                    <select name="jenisKelamin" class="form-control select2" style="width: 100%;" required>
                    <option selected="selected"> - </option>
                    <option value="Laki - Laki">LAKI - LAKI</option>
                    <option value="Perempuan">PEREMPUAN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir <span style="color:red;">*</span></label>
                    <input type="date" name="tanggalLahir" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Tanggal Lahir" required>
                </div>
                <div class="form-group">
                    <label>Golongan Darah <span style="color:red;">*</span></label>
                    <select name="golDarah"  class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                    <option> - Silahkan Pilih Golongan Darah - </option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                    <option>Tidak Tahu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Kawin <span style="color:red;">*</span></label>
                    <select name="statusKawin"  class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option> - Silahkan Pilih Status Kawin - </option>
                      <option>Belum Kawin</option>
                      <option>Kawin</option>
                      <option>Janda</option>
                      <option>Duda</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Status Pendidikan <span style="color:red;">*</span></label>
                    <select name="pendidikanDitempuh" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option> - Silahkan Pilih Pendidikan Yang Ditempuh - </option>
                      <?php
                      foreach($dataPendidikanDitempuh as $dpd){
                      ?>
                      <option><?= $dpd['jenisPendidikan']?></option>
                      <?php 
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Keluarga <span style="color:red;">*</span></label>
                    <select name="statusKeluarga" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option> - Silahkan Pilih Status Keluarga - </option>
                      <option>Suami</option>
                      <option>Istri</option>
                      <option>Anak</option>
                      <option>Menantu</option>
                      <option>Cucu</option>
                      <option>Keponakan</option>
                      <option>Orang Tua</option>
                      <option>Mertua</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Penghasilan Per Bulan <span style="color:red;">*</span></label>
                    <input type="number" name="penghasilan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan jumlah penghasilan perbulan" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RW<span style="color:red;">*</span></label>
                    <input type="text" name="RW" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Desa / Kelurahan" required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dusun <span style="color:red;">*</span></label>
                    <select name="dusun"  class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                        <option> - Silahkan Pilih Dusun - </option>
                        <?php 
                        foreach($dataDusun as $ds){?>
                        <option value="<?=$ds['idDusun']?>"><?=$ds['namaDusun']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
          </div>
          <div class="card-footer" style="text-align:right;">
            <button type="submit" class="btn btn-primary" style="background-color:red; border-color: red;">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
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
  require('AFooter.php');
?>  