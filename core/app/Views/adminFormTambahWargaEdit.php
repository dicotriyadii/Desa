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
          <h1>Edit Data <?=$dataWarga[0]['namaWarga'];?></h1>
          </div>
        <div class="card card-default">
          <div class="card-body">
          <form class="form-horizontal" action="../ProsesEditWarga" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Induk Kependudukan (NIK) <span style="color:red;">*</span></label>
                    <input type="text"   name="idWarga" class="form-control" value=<?=$dataWarga[0]['idWarga']?> hidden>
                    <input type="number"   name="noKTP" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['nomorIndukKependudukan']?> required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap <span style="color:red;">*</span></span></label>
                    <input type="text" name="namaWarga" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['namaWarga']?> required> 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir <span style="color:red;">*</span></label>
                    <input type="text"  name="tempatLahir" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['tempatLahir']?> required>
                </div>
                <div class="form-group">
                    <label>Agama <span style="color:red;">*</span></label>
                    <select name="agama" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required onkeyup="this.value = this.value.toUpperCase()">
                      <option value="<?=$dataWarga[0]['agama']?>"> <?=$dataWarga[0]['agama']?> </option>
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
                    <select name="pendidikanTerakhir" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option value="<?=$dataWarga[0]['pendidikanTerakhir']?>"> <?=$dataWarga[0]['pendidikanTerakhir']?> </option>
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
                    <select name="pekerjaan" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option value=<?=$dataWarga[0]['pekerjaan']?>> <?=$dataWarga[0]['pekerjaan']?> </option>
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
                    <input type="number" name="bpjs" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['bpjs']?> required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['alamat']?> required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RT<span style="color:red;">*</span></label>
                    <input type="text" name="RT" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['RT']?> required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon <span style="color:red;">*</span></label>
                    <input type="number"   name="noTelp" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['noTelpon']?> required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Kartu Keluarga <span style="color:red;">*</span></label>
                    <input type="number"  name="nomorKartuKeluarga" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['nomorKartuKeluarga']?> required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin <span style="color:red;">*</span></label>
                    <select name="jenisKelamin" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                    <option value=<?=$dataWarga[0]['jenisKelamin']?>> <?=$dataWarga[0]['jenisKelamin']?> </option>
                    <option value="Laki - Laki">LAKI - LAKI</option>
                    <option value="Perempuan">PEREMPUAN</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir <span style="color:red;">*</span></label>
                    <input type="date" name="tanggalLahir" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['tanggalLahir']?> required>
                </div>
                <div class="form-group">
                    <label>Golongan Darah <span style="color:red;">*</span></label>
                    <select name="golDarah" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                    <option value=<?=$dataWarga[0]['golDarah']?>> <?=$dataWarga[0]['golDarah']?> </option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                    <option>Tidak Tahu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Kawin <span style="color:red;">*</span></label>
                    <select name="statusKawin" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option value=<?=$dataWarga[0]['statusKawin']?>> <?=$dataWarga[0]['statusKawin']?> </option>
                      <option>Belum Kawin</option>
                      <option>Kawin</option>
                      <option>Janda</option>
                      <option>Duda</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Status Pendidikan <span style="color:red;">*</span></label>
                    <select name="pendidikanDitempuh" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                      <option value=<?=$dataWarga[0]['pendidikanDitempuh']?>> <?=$dataWarga[0]['nomorIndukKependudukan']?> </option>
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
                      <option value=<?=$dataWarga[0]['statusKeluarga']?>> <?=$dataWarga[0]['statusKeluarga']?> </option>
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
                    <input type="number" name="penghasilan" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['penghasilan']?> required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RW<span style="color:red;">*</span></label>
                    <input type="text" name="RW" class="form-control" id="exampleInputEmail1" value=<?=$dataWarga[0]['RW']?> required onkeyup="this.value = this.value.toUpperCase()">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dusun <span style="color:red;">*</span></label>
                    <select name="dusun" class="form-control selectpicker" data-live-search="true" style="width: 100%;" required>
                        <?php
                        if($dataWarga[0]['kodeDusun'] == 0){?>
                        <option value="0"> Tidak Memiliki Dusun </option>
                        <?php
                        }else{?>
                        <option value=<?=$dataWarga[0]['kodeDusun']?>> <?=$dataWarga[0]['namaDusun']?> </option>
                        <?php
                        }
                        ?>
                        <?php 
                        foreach($dataDusun as $ds){?>
                        <option value="<?= $ds['idDusun']?>"><?=$ds['namaDusun']?></option>
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
  require('AEditFooter.php');
?>  