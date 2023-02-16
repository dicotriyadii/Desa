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
            <h1>Tambah Anggota PKK</h1>
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
          <form class="form-horizontal" action="ProsesAnggotaPKK" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Anggota<span style="color:red;">*</span></span></label>
                    <input type="text" name="namaAnggota" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Anggota">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
                    <textarea name="keteranganAnggotaPKK" class="form-control" style="width:100%;height:150px;"></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan<span style="color:red;">*</span></label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan">
                      <option selected="selected"> - </option>
                      <option value="Ketua">Ketua</option>
                      <option value="Wakil Ketua">Wakil Ketua</option>
                      <option value="Sekretaris">Sekretaris</option>
                      <option value="Wakil Sekretaris">Wakil Sekretaris</option>
                      <option value="Bendahara">Bendahara</option>
                      <option value="Wakil Bendahara">Wakil Bendahara</option>
                      <option value="Ketua Pokja I">Ketua Pokja I</option>
                      <option value="Ketua Pokja II">Ketua Pokja II</option>
                      <option value="Ketua Pokja III">Ketua Pokja III</option>
                      <option value="Ketua Pokja IV">Ketua Pokja IV</option>
                      <option value="Anggota Pokja I">Anggota Pokja I</option>
                      <option value="Anggota Pokja II">Anggota Pokja II</option>
                      <option value="Anggota Pokja III">Anggota Pokja III</option>
                      <option value="Anggota Pokja IV">Anggota Pokja IV</option>
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