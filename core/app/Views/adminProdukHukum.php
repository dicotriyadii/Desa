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
            <h1>Produk Hukum</h1>
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
                <a href="#" data-toggle="modal" data-target="#modalTambahProdukHukum" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Produk Hukum</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk Hukum</th>
                    <th>Petugas</th>
                    <th>Tanggal Upload</th>
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
                    <td><?=$d['namaProdukHukum']?></td>
                    <td><?=$d['authorProdukHukum']?></td>
                    <td><?=$d['tanggalUpload']?></td>
                    <td>
                      <a href="<?=base_url()?>/downloadProdukHukum/<?= $d['idProdukHukum']?>" style="color:gray;">Download</a><br>
                      <a href="" data-toggle="modal" data-target="#edit<?=$d['idProdukHukum']?>"  style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusProdukHukum/<?= $d['idProdukHukum']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?=$d['idProdukHukum']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Produk Hukum</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesEditTambahProdukHukum" method="POST"  enctype="multipart/form-data">
                            <label for="exampleInputEmail1">Judul Produk Hukum<span style="color:red;">*</span></span></label>
                            <input type="text" name="judulProdukHukum" class="form-control" id="exampleInputEmail1" value="<?=$d['namaProdukHukum']?>">
                            <input type="text" name="idProdukHukum" class="form-control" id="exampleInputEmail1" value="<?=$d['idProdukHukum']?>" hidden>
                            <label for="exampleInputEmail1">Upload Berkas<span style="color:red;">*</span></span></label><br>
                            <input type="file" name="file">
                          </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      </form>
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
<!-- Modal -->
<div class="modal fade" id="modalTambahProdukHukum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Hukum</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesTambahProdukHukum" method="POST"  enctype="multipart/form-data">
          <label for="exampleInputEmail1">Judul Produk Hukum<span style="color:red;">*</span></span></label>
          <input type="text" name="judulProdukHukum" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Artikel">
          <label for="exampleInputEmail1">Upload Berkas<span style="color:red;">*</span></span></label><br>
          <input type="file" name="file" required>
        </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
  </div>
</div>

<?php
  require('AFooter.php');
?>  