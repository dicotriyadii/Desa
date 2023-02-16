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
            <h1>Perubahan data Informasi Publik</h1>
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
          <form class="form-horizontal" action="../ProsesEditInformasiPublik" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Informasi Publik<span style="color:red;">*</span></span></label>
                    <input type="text" name="informasiPublik" class="form-control" id="exampleInputEmail1" value="<?= $d['namaInformasiPublik'];?>">
                    <input type="text" name="idInformasiPublik" value="<?= $d['idInformasiPublik'];?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
                    <textarea name="keterangan" class="form-control" style="width:100%;height:150px;"><?= $d['keterangan'];?></textarea>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Berkas<span style="color:red;">*</span></span></label><br>
                    <input type="file" name="file" required>
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