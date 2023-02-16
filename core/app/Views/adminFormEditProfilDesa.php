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
            <h1>Perubahan Profil Desa</h1>
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
          <form class="form-horizontal" action="../ProsesEditProfilDesa" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan Desa<span style="color:red;">*</span></span></label>
                    <textarea name="keteranganDesa"  class="ckeditor" id="ckedtor"><?= $d['keteranganDesa'];?></textarea>
                    <input type="text" name="idProfilDesa" value="<?= $d['idProfilDesa'];?>" hidden>
                </div>
                <!-- /.form-group -->
              </div>
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