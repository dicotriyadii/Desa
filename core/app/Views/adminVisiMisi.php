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
            <h1>Visi Misi</h1>
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
                <?php
                if($data == null){?>
                  <a href=""data-toggle="modal" data-target="#modalVisiMisi" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Visi Misi</a>
                <?php
                }
                ?>
              </div>
              <div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Visi Misi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesTambahVisiMisi" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Visi Desa<span style="color:red;">*</span></span></label>
                              <textarea name="visi" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Misi Desa<span style="color:red;">*</span></span></label>
                            <textarea name="misi" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></span></label>
                              <textarea name="keterangan" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"></textarea>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
                              <input type="file" name="gambar" required> 
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($data as $d){
                    ?>
                  <tr>
                    <td><?=$d['visi']?></td>
                    <td><?=$d['misi']?></td>
                    <td><img src="<?=base_url()?>/assets/<?=$d['gambar']?>" style="width:30%;"></td>
                    <td><a href=""data-toggle="modal" data-target="#modalEditVisiMisi" style="color:green;">Edit</a></td>
                  </tr>
                  <div class="modal fade" id="modalEditVisiMisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Pemberitahuan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <form class="form-horizontal" action="ProsesEditTambahVisiMisi" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" value="<?=$d['idVisiMisi']?>" name="idVisiMisi"hidden> 
                                <label for="exampleInputEmail1">Visi Desa<span style="color:red;">*</span></span></label>
                                <textarea name="visi" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"><?=$d['visi']?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Misi Desa<span style="color:red;">*</span></span></label>
                              <textarea name="misi" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"><?=$d['misi']?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></span></label>
                              <textarea name="keterangan" style="width:100%;height:300px;" class="ckeditor" id="ckedtor"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
                              <input type="file" name="gambar"> 
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                          </form>
                          </div>
                        </div>
                      </div>
                  <?php
                    }
                  ?>
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