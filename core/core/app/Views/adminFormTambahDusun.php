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
            <h1>Form Tambah Dusun</h1>
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
          <form class="form-horizontal" action="ProsesTambahDusun" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Dusun <span style="color:red;">*</span></span></label>
                    <input type="text" name="namaDusun" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Dusun">
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:red; border-color: red;">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>

          </form>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dusun</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=0;
              foreach($dataDusun as $ds){
              $no++;
              ?>
              <tr>
                <td><?=$no;?></td>
                <td><?=$ds['namaDusun']?></td>
                <td>
                  <a href="<?=base_url()?>/hapusDusun/<?= $ds['idDusun']?>" style="color:red;">Hapus</a>
                </td>
              </tr>
              <?php
              }
              ?>
              </table>
          </div>
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