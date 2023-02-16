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
            <h1>Tambah Anggota Pemerintah</h1>
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
          <form class="form-horizontal" action="ProsesAnggotaPemerintah" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Anggota<span style="color:red;">*</span></span></label>
                    <input type="text" name="namaAnggota" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Anggota">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
                    <textarea name="keteranganAnggotaPemerintah" class="form-control" style="width:100%;height:150px;">
                    </textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan<span style="color:red;">*</span></label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan">
                      <option selected="selected"> - </option>
                      <option value="Kepala Desa">Kepala Desa</option>
                      <option value="Sekretaris Desa">Sekretaris Desa</option>
                      <option value="Kepala Urusan Umum">Kepala Urusan Umum</option>
                      <option value="Kepala Urusan Keuangan">Kepala Urusan Keuangan</option>
                      <option value="Kepala Urusan Perencanaan">Kepala Urusan Perencanaan</option>
                      <option value="Kepala Seksi Kesejahteraan Masyarakat">Kepala Seksi Kesejahteraan Masyarakat</option>
                      <option value="Kepala Seksi Pelayanan">Kepala Seksi Pelayanan</option>
                      <option value="Kepala Seksi Pemerintah">Kepala Seksi Pemerintah</option>
                      <option value="Kepala Dusun">Kepala Dusun</option>
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