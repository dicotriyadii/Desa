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
            <h1>Tambah Berita</h1>
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
          <form class="form-horizontal" action="ProsesBerita" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Berita<span style="color:red;">*</span></span></label>
                    <input type="text" name="judulBerita" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Berita">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
                    <textarea name="keterangan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kategori Berita / Kegiatan<span style="color:red;">*</span></span></label><br>
                    <select class="form-control" name="kategori">
                      <option>- Silahkan Pilih Kategori Berita / Kegiatan -</option>
                      <?php
                      foreach($dataKategori as $dk){?>
                      <option><?=$dk['jenisKategori']?></option>
                      <?php
                      }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
                    <input type="file" name="file" required>
                </div>
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