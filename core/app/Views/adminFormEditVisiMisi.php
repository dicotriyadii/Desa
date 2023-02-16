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
            <h1>Perubahan Visi dan Misi</h1>
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
          <form class="form-horizontal" action="../ProsesEditVisiMisi" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($data as $d){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Visi Desa<span style="color:red;">*</span></span></label>
                    <textarea name="visi" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"><?= $d['visi'];?></textarea>
                    <input type="text" name="idVisiMisi" value="<?= $d['idVisiMisi'];?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Misi Desa<span style="color:red;">*</span></span></label>
                    <textarea name="misi" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"><?= $d['misi'];?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></span></label>
                    <textarea name="keterangan" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"><?= $d['keterangan'];?></textarea>
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