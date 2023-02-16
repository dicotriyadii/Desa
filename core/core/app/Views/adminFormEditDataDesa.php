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
            <h1>Perubahan Data Desa</h1>
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
          <form class="form-horizontal" action="../ProsesEditDataDesa" method="POST"  enctype="multipart/form-data">
            <?php
            foreach($dataDesa as $ds){
            ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kecamatan<span style="color:red;">*</span></span></label>
                    <input type="text" name="namaKecamatan" class="form-control" id="exampleInputEmail1" value="<?= $ds['namaKecamatan']?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Desa<span style="color:red;">*</span></span></label>
                    <input type="text" name="alamatDesa" class="form-control" id="exampleInputEmail1" value="<?= $ds['alamatDesa']?>">
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                    <label for="exampleInputEmail1">Nama Desa<span style="color:red;">*</span></span></label>
                    <input type="text" name="namaDesa" class="form-control" id="exampleInputEmail1" value="<?= $ds['namaDesa']?>">
                    <input type="text" name="idDesa" value="<?= $ds['idDesa'];?>" hidden>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Link Peta Desa (Google Maps)<span style="color:red;">*</span></label>
                    <textarea name="linkPetaDesa" class="form-control" style="width:100%;height:150px;"><?= $ds['linkPetaDesa']?></textarea>
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