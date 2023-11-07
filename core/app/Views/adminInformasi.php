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
            <h1>Informasi Publik</h1>
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
                <a href="" data-toggle="modal" data-target="#modalTambahBerita" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Informasi Publik</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Informasi</th>
                    <th>Isi Informasi</th>
                    <th>Penguasa Informasi</th>
                    <th>Penanggung Jawab</th>
                    <th>Tempat</th>
                    <th>Retensi</th>
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
                    <td><?=$d['jenisInformasi']?></td>
                    <td><?=$d['isiInformasi']?></td>
                    <td><?=$d['penguasaInformasi']?></td>
                    <td><?=$d['penanggungJawab']?></td>
                    <td><?=$d['tempat']?></td>
                    <td><?=$d['retensi']?></td>
                    <td>
                      <a href="<?=base_url()?>/downloadInformasi/<?= $d['idInformasi']?>" style="color:green;">Download</a><br>                        
                      <a href="#" data-toggle="modal" data-target="#edit<?=$d['idInformasi']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusInformasi/<?= $d['idInformasi']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?=$d['idInformasi']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" action="ProsesEditTambahInformasi" method="POST"  enctype="multipart/form-data">
                          <label for="exampleInputEmail1">Isi Informasi<span style="color:red;">*</span></label>
                          <input type="text" name="idInformasi" class="form-control" id="exampleInputEmail1" value="<?=$d['idInformasi']?>" hidden>
                          <select name="jenisInformasi" class="form-control">
                            <option value="<?=$d['isiInformasi']?>"><?=$d['jenisInformasi']?></option>
                            <option value="setiap saat">Setiap Saat</option>
                            <option value="berkala">Berkala</option>
                            <option value="serta merta">Serta Merta</option>
                            <option value="dikecualikan">Dikecualikan</option>
                          </select>
                          <label for="exampleInputEmail1">Isi Informasi<span style="color:red;">*</span></label>
                          <textarea name="isiInformasi" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"><?=$d['isiInformasi']?></textarea>
                          <label for="exampleInputEmail1">Penguasa Informasi<span style="color:red;">*</span></span></label>
                          <input type="text" name="penguasaInformasi" class="form-control" id="exampleInputEmail1" value="<?=$d['penguasaInformasi']?>">
                          <label for="exampleInputEmail1">Penanggung Jawab<span style="color:red;">*</span></span></label>
                          <input type="text" name="penanggungJawab" class="form-control" id="exampleInputEmail1" value="<?=$d['penanggungJawab']?>">
                          <label for="exampleInputEmail1">Tempat<span style="color:red;">*</span></span></label>
                          <input type="text" name="tempat" class="form-control" id="exampleInputEmail1" value="<?=$d['tempat']?>">
                          <label for="exampleInputEmail1">Retensi<span style="color:red;">*</span></span></label>
                          <input type="text" name="retensi" class="form-control" id="exampleInputEmail1" value="<?=$d['retensi']?>"><br>
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
<div class="modal fade" id="modalTambahBerita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi Publik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesTambahInformasi" method="POST"  enctype="multipart/form-data">
          <label for="exampleInputEmail1">Isi Informasi<span style="color:red;">*</span></label>
          <select name="jenisInformasi" class="form-control">
            <option value="">- Silahkan Jenis Informasi -</option>
            <option value="setiap saat">Setiap Saat</option>
            <option value="berkala">Berkala</option>
            <option value="serta merta">Serta Merta</option>
            <option value="dikecualikan">Dikecualikan</option>
          </select>
          <label for="exampleInputEmail1">Isi Informasi<span style="color:red;">*</span></label>
          <textarea name="isiInformasi" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"></textarea>
          <label for="exampleInputEmail1">Penguasa Informasi<span style="color:red;">*</span></span></label>
          <input type="text" name="penguasaInformasi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Lengkap">
          <label for="exampleInputEmail1">Penanggung Jawab<span style="color:red;">*</span></span></label>
          <input type="text" name="penanggungJawab" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat">
          <label for="exampleInputEmail1">Tempat<span style="color:red;">*</span></span></label>
          <input type="text" name="tempat" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Pekerjaan">
          <label for="exampleInputEmail1">Retensi<span style="color:red;">*</span></span></label>
          <input type="text" name="retensi" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Telepon">
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