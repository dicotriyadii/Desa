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
            <h1>Perubahan data Pengguna</h1>
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
          <form class="form-horizontal" action="../ProsesEditPengguna" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username<span style="color:red;">*</span></span></label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username" value="<?= $d['username'];?>">
                    <input type="text" name="idUser" value="<?= $d['idUser'];?>" hidden>
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Password<span style="color:red;">*</span></span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username">
                </div> -->
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama<span style="color:red;">*</span></label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama" value="<?= $d['nama'];?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control select2" style="width: 100%;" name="jabatan">
                      <option selected="selected"> <?= $d['jabatan'];?> </option>
                      <option value="Kepala Desa">Kepala Desa</option>
                      <option value="Perangkat Desa">Perangkat Desa</option>
                      <option value="Operator Desa">Operator Desa</option>
                    </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                    <label>Hak Akses</label>
                    <select class="form-control select2" style="width: 100%;" name="hakAkses">
                      <option selected="selected"> <?= $d['hakAkses'];?> </option>
                      <option value="admin">Admin</option>
                      <option value="superAdmin">Super Admin</option>
                    </select>
                </div>
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