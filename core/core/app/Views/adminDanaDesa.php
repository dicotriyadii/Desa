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
            <h1>Dana Desa</h1>
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
                <a href="<?= base_url()?>/adminDanaPelaksanaan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Dana Pelaksanaan</a>
                <a href="<?= base_url()?>/adminDanaPendapatan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Dana Pendapatan</a>
                <a href="<?= base_url()?>/adminDanaPembelanjaan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Dana Pembelanjaan</a>
              </div>
              <div class="card-body">
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