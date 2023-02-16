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
            <h1>Struktur Organisasi BPD</h1>
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
                <a href="#"data-toggle="modal" data-target="#modalTambahBPD" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Anggota BPD</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Jabatan</th>
                    <th>Gambar</th>
                    <th>Keterangan</th>
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
                    <td><?= $d['namaAnggota'];?></td>
                    <td><?= $d['jabatan'];?></td>
                    <td><img src="../foto/<?= $d['gambar']?>"style="width:50px;heigth:50px;"></td>
                    <td><?= $d['keterangan'];?></td>
                    <td>
                    <a href="#"data-toggle="modal" data-target="#modalEdit<?= $d['idAnggotaBpd']?>" style="color:green;">Edit</a><br>
                    <a href="<?=base_url()?>/hapusAnggotaBPD/<?= $d['idAnggotaBpd']?>" style="color:red;">Hapus</a>
                    <!-- #modal -->
                    <div class="modal fade" id="modalEdit<?=$d['idAnggotaBpd']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Anggota BPD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form class="form-horizontal" action="ProsesEditAnggotaBPD" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Nama Anggota</label><br>
                              <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anggota" value="<?=$d['namaAnggota']?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Jabatan</label><br>
                              <select name="jabatan" class="form-control" required>
                                <option><?=$d['jabatan']?></option>
                                <option>Ketua</option>
                                <option>Wakil Ketua</option>
                                <option>Sekretaris</option>
                                <option>Anggota</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">Keterangan</label><br>
                              <textarea name="keterangan" class="form-control"><?=$d['keterangan']?></textarea>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Upload Foto<span style="color:red;">*</span></span></label><br>
                              <input type="file" name="foto">
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
<!-- #modal -->
<div class="modal fade" id="modalTambahBPD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota BPD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="ProsesAnggotaBPD" method="POST"  enctype="multipart/form-data">
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Anggota</label><br>
          <input type="text" name="namaAnggota" class="form-control" placeholder="Masukkan Nama Anggota" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Jabatan</label><br>
          <select name="jabatan" class="form-control" required>
            <option>- Silahkan Pilih Jabatan -</option>
            <option>Ketua</option>
            <option>Wakil Ketua</option>
            <option>Sekretaris</option>
            <option>Anggota</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Keterangan</label><br>
          <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Upload Foto<span style="color:red;">*</span></span></label><br>
          <input type="file" name="foto" required>
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