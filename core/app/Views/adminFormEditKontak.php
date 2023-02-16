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
            <h1>Perubahan Sejarah Desa</h1>
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
          <form class="form-horizontal" action="../ProsesEditKontak" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon<span style="color:red;">*</span></span></label>
                    <input type="text" name="nomorKontak" class="form-control" id="exampleInputEmail1" value="<?= $d['nomorKontak']?>">
                    <input type="text" name="idKontak" value="<?= $d['idKontak'];?>" hidden>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email<span style="color:red;">*</span></span></label>
                    <input type="email" name="emailKontak" class="form-control" id="exampleInputEmail1" value="<?= $d['emailKontak']?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Facebook<span style="color:red;">*</span></span></label>
                    <input type="text" name="facebookKontak" class="form-control" id="exampleInputEmail1" value="<?= $d['facebookKontak']?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">instagram<span style="color:red;">*</span></span></label>
                    <input type="text" name="instagramKontak" class="form-control" id="exampleInputEmail1" value="<?= $d['instagramKontak']?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Youtube<span style="color:red;">*</span></span></label>
                    <input type="text" name="youtubeKontak" class="form-control" id="exampleInputEmail1" value="<?= $d['youtubeKontak']?>">
                </div>
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