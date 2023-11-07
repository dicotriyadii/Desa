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
            <h1>Artikel</h1>
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
                <a href="" data-toggle="modal" data-target="#modalTambahWarga" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Artikel</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Artikel</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Gambar</th>
                    <th>Petugas</th>
                    <th>Status</th>
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
                    <td><?=$d['judulArtikel']?></td>
                    <td><?=$d['tanggalArtikel']?></td>
                    <td><?=$d['keterangan']?></td>
                    <td><img src="artikel/<?= $d['gambarArtikel'] ?>" style="width:100px;heigth:100px;"></td>
                    <td><?=$d['authorArtikel']?></td>
                    <?php
                    if($d['status'] == 'Sudah Validasi'){?>
                      <td><span style="color:green">Sudah Validasi</span></td>
                    <?php
                    }else if($d['status'] == 'Belum Validasi'){?>
                      <td><span style="color:red">Belum Validasi</span></td>
                    <?php
                    } 
                    ?>
                    <td>
                      <a href="<?=base_url()?>/sudahValidasiArtikel/<?= $d['idArtikel']?>" style="color:green;">Sudah Validasi</a><br>                        
                      <a href="<?=base_url()?>/belumValidasiArtikel/<?= $d['idArtikel']?>" style="color:orange;">Belum Validasi</a><br>
                      <a href="" data-toggle="modal" data-target="#edit<?=$d['idArtikel']?>"  style="color:gray;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusArtikel/<?= $d['idArtikel']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?=$d['idArtikel']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" action="ProsesEditTambahArtikel" method="POST"  enctype="multipart/form-data">
                          <label for="exampleInputEmail1">Judul Artikel<span style="color:red;">*</span></span></label>
                          <input type="text" name="judulArtikel" class="form-control" id="exampleInputEmail1" value="<?=$d['judulArtikel']?>">
                          <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
                          <textarea name="keterangan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"><?=$d['judulArtikel']?></textarea>
                          <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
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
<div class="modal fade" id="modalTambahWarga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesTambahArtikel" method="POST"  enctype="multipart/form-data">
              <label for="exampleInputEmail1">Judul Artikel<span style="color:red;">*</span></span></label>
              <input type="text" name="judulArtikel" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul Artikel">
              <label for="exampleInputEmail1">Keterangan<span style="color:red;">*</span></label>
              <!-- <textarea name="keterangan" class="form-control" style="width:100%;height:150px;"></textarea> -->
              <textarea name="keterangan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"></textarea>
              <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
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