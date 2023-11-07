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
            <h1>Data Penggguna</h1>
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
              <div class="card-footer" style="text-align:left; margin-top:15px;background-color:white;">
                <a href="<?= base_url()?>/formPengguna" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah User</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($data as $d){
                    ?>
                  <tr>
                    <td><?= $d['username']?></td>
                    <td><?= $d['nama']?></td>
                    <td>
                      <?php
                        if($d['hakAkses'] == 'admin'){?>
                          <p>Admin</p>
                        <?php
                        }else if($d['hakAkses'] == 'superAdmin'){?>
                          <p>Super Admin</p>
                        <?php
                        }
                        ?>
                    </td>
                    <td>
                      <a href="<?= base_url()?>/hapusAkun/<?=$d['idUser']?>" style="color:red;">Hapus</a><br>
                      <a href="<?= base_url()?>/editAkun/<?=$d['idUser']?>" style="color:green;">Edit</a>
                      <?php
                      ?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                  </tbody>
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