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
            <h1>Permohonan Informasi Publik</h1>
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
                <a href="" data-toggle="modal" data-target="#modalTambahBerita" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Permohonan Informasi Publik</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK Pemohon</th>
                    <th>Nama Pemohon</th>
                    <th>Alamat Pemohon</th>
                    <th>Pekerjaan</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Informasi Pengajuan</th>
                    <th>Alasan Pengajuan</th>
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
                    <td><?=$d['nikPemohon']?></td>
                    <td><?=$d['namaPemohon']?></td>
                    <td><?=$d['alamatPemohon']?></td>
                    <td><?=$d['pekerjaanPemohon']?></td>
                    <td><?=$d['nomorTeleponPemohon']?></td>
                    <td><?=$d['emailPemohon']?></td>
                    <td><?=$d['informasiPengajuan']?></td>
                    <td><?=$d['alasanPengajuan']?></td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#edit<?=$d['idPermohonanInformasi']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusPermohonanInformasi/<?= $d['idPermohonanInformasi']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                  <!-- Modal -->
                  <div class="modal fade" id="edit<?=$d['idPermohonanInformasi']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal" action="ProsesEditTambahPermohonanInformasi" method="POST"  enctype="multipart/form-data">
                          <label for="exampleInputEmail1">Nomor Induk Kependudukan<span style="color:red;">*</span></span></label>
                          <input type="text" name="idPermohonanInformasi" class="form-control" id="exampleInputEmail1" value="<?=$d['idPermohonanInformasi']?>" hidden>
                          <input type="text" name="nikPemohon" class="form-control" id="exampleInputEmail1" value="<?=$d['nikPemohon']?>">
                          <label for="exampleInputEmail1">Nama Lengkap<span style="color:red;">*</span></span></label>
                          <input type="text" name="namaPemohon" class="form-control" id="exampleInputEmail1" value="<?=$d['namaPemohon']?>">
                          <label for="exampleInputEmail1">Alamat<span style="color:red;">*</span></span></label>
                          <input type="text" name="alamatPemohon" class="form-control" id="exampleInputEmail1" value="<?=$d['alamatPemohon']?>">
                          <label for="exampleInputEmail1">Pekerjaan<span style="color:red;">*</span></span></label>
                          <input type="text" name="pekerjaanPemohon" class="form-control" id="exampleInputEmail1" value="<?=$d['pekerjaanPemohon']?>">
                          <label for="exampleInputEmail1">Nomor Telepon<span style="color:red;">*</span></span></label>
                          <input type="text" name="nomorTeleponPemohon" class="form-control" id="exampleInputEmail1" value="<?=$d['nomorTeleponPemohon']?>">
                          <label for="exampleInputEmail1">Email<span style="color:red;">*</span></span></label>
                          <input type="text" name="emailPemohon" class="form-control" id="exampleInputEmail1" value="<?=$d['emailPemohon']?>">
                          <label for="exampleInputEmail1">Informasi Pengajuan<span style="color:red;">*</span></label>
                          <textarea name="informasiPengajuan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"><?=$d['informasiPengajuan']?></textarea>
                          <label for="exampleInputEmail1">Alasan Pengajuan<span style="color:red;">*</span></label>
                          <textarea name="alasanPengajuan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"><?=$d['alasanPengajuan']?></textarea>
                        </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Perubahan Permohonan</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Permohonan Informasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesTambahPermohonanInformasi" method="POST"  enctype="multipart/form-data">
          <label for="exampleInputEmail1">Nomor Induk Kependudukan<span style="color:red;">*</span></span></label>
          <input type="text" name="nikPemohon" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Induk Kependudukan">
          <label for="exampleInputEmail1">Nama Lengkap<span style="color:red;">*</span></span></label>
          <input type="text" name="namaPemohon" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Lengkap">
          <label for="exampleInputEmail1">Alamat<span style="color:red;">*</span></span></label>
          <input type="text" name="alamatPemohon" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Alamat">
          <label for="exampleInputEmail1">Pekerjaan<span style="color:red;">*</span></span></label>
          <input type="text" name="pekerjaanPemohon" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Pekerjaan">
          <label for="exampleInputEmail1">Nomor Telepon<span style="color:red;">*</span></span></label>
          <input type="text" name="nomorTeleponPemohon" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Telepon">
          <label for="exampleInputEmail1">Email<span style="color:red;">*</span></span></label>
          <input type="text" name="emailPemohon" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Email">
          <label for="exampleInputEmail1">Informasi Pengajuan<span style="color:red;">*</span></label>
          <textarea name="informasiPengajuan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"></textarea>
          <label for="exampleInputEmail1">Alasan Pengajuan<span style="color:red;">*</span></label>
          <textarea name="alasanPengajuan" style="width:100%;height:150px;" class="ckeditor" id="ckedtor"></textarea>
        </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
    </div>
    </form>
  </div>
</div>

<?php
  require('AFooter.php');
?>  