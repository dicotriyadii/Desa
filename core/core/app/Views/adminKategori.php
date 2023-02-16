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
            <h1>Kategori Kegiatan / Berita</h1>
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
                <a href=""data-toggle="modal" data-target="#modalTambahKategori" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Kategori</a>
                <a href="<?= base_url()?>/adminBerita" style="background-color:gray;padding:8px 10px;border-radius:10px;color:white;">Kembali</a>      
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Kategori</th>
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
                    <td><?=$no;?></td>
                    <td><?=$d['jenisKategori']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modal<?= $d['idKategori']; ?>">Edit</a><br>
                      <a href="<?=base_url()?>/hapusKategori/<?= $d['idKategori']?>" style="color:red;">Hapus</a>
                      <!-- #modal -->
                      <div class="modal fade" id="modal<?= $d['idKategori']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form class="form-horizontal" action="ProsesEditKategori" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Jenis Kategori</label><br>
                                <input type="text" value="<?=$d['jenisKategori']?>" name="kategori" class="form-control" placeholder="Masukkan Jenis Kategori" required>
                                <input type="text" value="<?=$d['idKategori']?>" hidden name="idKategori">
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                          </form>
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
<!-- #modal -->
    <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="ProsesTambahKategori" method="POST"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Kategori</label><br>
                        <input type="text" name="kategori" class="form-control" placeholder="Masukkan Jenis Kategori" required>
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
  require('AFooter.php');
?>  