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
            <h1>Pengumuman</h1>
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
                <a href=""data-toggle="modal" data-target="#modalPengumuman" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Pengumuman</a>
              </div>
                <div class="modal fade" id="modalPengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="TambahPengumuman" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Pengumuman<span style="color:red;">*</span></label>
                              <textarea name="pengumuman" class="form-control" style="width:100%;height:150px;"></textarea>
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
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pengumuman</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($data as $d){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $d['tanggalPengumuman'] ?></td>
                    <td><?= $d['pengumuman'] ?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditPengumuman" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusPengumuman/<?= $d['idPengumuman']?>" style="color:red;">Hapus</a>
                      <div class="modal fade" id="modalEditPengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Pengumuman</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="TambahEditPengumuman" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Pengumuman<span style="color:red;">*</span></label>
                                  <textarea name="pengumuman" class="form-control" style="width:100%;height:150px;"><?=$d['pengumuman']?></textarea>
                                  <input type="text" value="<?=$d['idPengumuman']?>" name="idPengumuman"hidden> 
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
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