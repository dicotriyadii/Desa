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
            <h1>Perubahan data Warga</h1>
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
          <form class="form-horizontal" action="../ProsesEditWarga" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Induk Kependudukan (NIK) <span style="color:red;">*</span></label>
                    <input type="number" name="noKTP" class="form-control" id="exampleInputEmail1" value=<?=$d['nomorIndukKependudukan']?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap <span style="color:red;">*</span></span></label>
                    <input type="text" name="namaWarga" class="form-control" id="exampleInputEmail1" value=<?=$d['namaWarga']?>>
                    <input type="text" name="idWarga" value=<?=$d['idWarga']?> hidden>
                </div>
                <div class="form-group">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="jenisKelamin" class="form-control select2" style="width: 100%;">
                        <option selected="selected"> <?=$d['jenisKelamin']?></option>
                        <option>Laki - Laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                  </div>
                <div class="form-group">
                    <label>Agama</label>
                    <select name="agama" class="form-control select2" style="width: 100%;">
                      <option selected="selected"> <?=$d['agama']?> </option>
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
                    <label>Pendidikan Terakhir</label>
                    <select name="pendidikanTerakhir" class="form-control select2" style="width: 100%;">
                      <option selected="selected"> <?=$d['pendidikanTerakhir']?></option>
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
                <label>Pekerjaan</label>
                    <select name="pekerjaan" class="form-control select2" style="width: 100%;">
                      <option selected="selected"><?=$d['pekerjaan']?></option>
                      <?php
                      foreach($dataPekerjaan as $dp){?>
                        <option><?= $dp['namaPekerjaan']?></option>
                      <?php 
                      } 
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">BPJS <span style="color:red;">*</span></label>
                    <input type="number" name="bpjs" class="form-control" id="exampleInputEmail1" value=<?=$d['bpjs']?> required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat <span style="color:red;">*</span></label>
                    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" value=<?=$d['alamat']?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RT<span style="color:red;">*</span></label>
                    <input type="text" name="RT" class="form-control" id="exampleInputEmail1" value=<?=$d['RT']?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Desa<span style="color:red;">*</span></label>
                    <input type="text" name="desa" class="form-control" id="exampleInputEmail1" value=<?=$d['desa']?> readonly>
                </div>
                <div class="form-group">
                    <label>Status Warga</label>
                    <select name="status" class="form-control select2" style="width: 100%;">
                    <option selected="selected"> <?=$d['status']?> </option>
                    <option>hidup</option>
                    <option>mati</option>
                    </select>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Kartu Keluarga <span style="color:red;">*</span></label>
                    <input type="number" name="nomorKK" class="form-control" id="exampleInputEmail1" value=<?=$d['nomorKartuKeluarga']?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir <span style="color:red;">*</span></label>
                    <input type="date" name="tanggalLahir" class="form-control" id="exampleInputEmail1" value=<?=$d['tanggalLahir']?>>
                </div>
                <div class="form-group">
                    <label>Golongan Darah</label>
                    <select name="golDarah" class="form-control select2" style="width: 100%;">
                    <option selected="selected"> <?=$d['golDarah']?> </option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                    <option>Tidak Tahu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Kawin</label>
                    <select name="statusKawin" class="form-control select2" style="width: 100%;">
                      <option selected="selected"> <?=$d['statusKawin']?> </option>
                      <option>Belum Kawin</option>
                      <option>Kawin</option>
                    </select>
                </div>
                <div class="form-group">
                <label>Status Pendidikan</label>
                    <select name="statusPendidikan" class="form-control select2" style="width: 100%;">
                      <option selected="selected"><?=$d['pendidikanDitempuh']?> </option>
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
                    <label>Status Keluarga</label>
                    <select name="statusKeluarga" class="form-control select2" style="width: 100%;">
                      <option selected="selected"> <?=$d['statusKeluarga']?>  </option>
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
                    <input type="number" name="penghasilan" class="form-control" id="exampleInputEmail1"  value="<?= $d['penghasilan']?>"required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Dusun <span style="color:red;">*</span></label>
                    <!-- <input type="text" name="dusun" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat"> -->
                    <select name="dusun" class="form-control select2" style="width: 100%;">
                        <option selected="selected"><?=$d['dusun']?></option>
                        <?php 
                        foreach($dataDusun as $ds){?>
                        <option><?=$ds['namaDusun']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">RW<span style="color:red;">*</span></label>
                    <input type="text" name="RW" class="form-control" id="exampleInputEmail1" value=<?=$d['RW']?>>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kecamatan <span style="color:red;">*</span></label>
                    <input type="text" name="kecamatan" class="form-control" id="exampleInputEmail1" value=<?=$d['kecamatan']?> readonly>
                </div>
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