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
            <h1>Tambah Pengguna</h1>
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
          <form class="form-horizontal" action="ProsesPengguna" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username<span style="color:red;">*</span></span></label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama<span style="color:red;">*</span></label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label>Pertanyaan Lupa Password <span style="color:red;">*</span></label>
                    <select class="form-control" name="pertanyaanLupaPassword">
                      <option style="color:black;"> - </option>
                      <option style="color:black;" value="Nama panggilan waktu kecil"> Nama panggilan waktu kecil ? </option>
                      <option style="color:black;" value="Asal Sekolah pada saat Taman Kanak Kanak"> Asal Sekolah pada saat Taman Kanak Kanak ? </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hak Akses <span style="color:red;">*</span></label>
                    <select class="form-control select2" style="width: 100%;" name="hakAkses">
                      <option selected="selected"> - </option>
                      <option value="admin">Admin</option>
                      <option value="superAdmin">Super Admin</option>
                    </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Password<span style="color:red;">*</span></span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label>Jabatan <span style="color:red;">*</span></label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan">
                      <option selected="selected"> - </option>
                      <option value="Kepala Desa">Kepala Desa</option>
                      <option value="Perangkat Desa">Perangkat Desa</option>
                      <option value="Operator Desa">Operator Desa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jawaban Pertanyaan Lupa Password <span style="color:red;">*</span></label>
                    <input type="text" name="jawabanLupaPassword" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Jawaban">
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