<?php
  require('AHeader.php');
  $status = $session->get('status');
  if($status != 'login'){
    return redirect()->to(base_url().'/login');
  }
  function rupiah($angka){	
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
  }
?>   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dana Pendapatan</h1>
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
                <a href="#"data-toggle="modal" data-target="#modalTambahPendapatan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Pendapatan</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Pendapatan</th>
                    <th>Jumlah</th>
                    <th>Status Pendapatan</th>
                    <th>Tahun</th>
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
                    <td><?=$d['jenisPendapatan']?></td>
                    <td><?=rupiah($d['jumlah'])?></td>
                    <td><?=$d['statusPendapatan']?></td>
                    <td><?=$d['tahun']?></td>
                    <td>
                      <a href="#"data-toggle="modal" data-target="#modalEditPendapatan"  style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusDanaPendapatan/<?= $d['idPendapatan']?>" style="color:red;">Hapus</a>
                      <!-- #modal -->
                        <div class="modal fade" id="modalEditPendapatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Pendapatan Desa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="ProsesEditPendapatan" method="POST"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Jenis Pendapatan</label><br>
                                            <select name="jenisPendapatan" class="form-control" required> 
                                                <option><?= $d['jenisPendapatan']?></option>
                                                <option>Dana Desa</option>
                                                <option>Bagi Hasil Pajak Dan Retribusi</option>
                                                <option>Alokasi Dana Desa</option>
                                                <option>Kesalahan Belanja Tahun sebelum nya</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Jumlah</label><br>
                                            <input type="number" value="<?= $d['jumlah']?>" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Status Pendapatan</label><br>
                                            <select name="statusPendapatan" class="form-control" required>
                                                <option><?= $d['statusPendapatan']?></option>
                                                <option>Realisasi</option>
                                                <option>Anggaran</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Tahun</label><br>
                                            <input type="number" value="<?= $d['tahun']?>" name="tahun" class="form-control" placeholder="Masukkan Tahun" required>
                                            <input type="number" value="<?= $d['idPendapatan']?>" name="idPendapatan" hidden>
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
<!-- #modal -->
<div class="modal fade" id="modalTambahPendapatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendapatan Desa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="ProsesTambahPendapatan" method="POST"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Pendapatan</label><br>
                        <select name="jenisPendapatan" class="form-control" required> 
                            <option>- Silahkan Pilih Jenis Pendapatan -</option>
                            <option>Dana Desa</option>
                            <option>Bagi Hasil Pajak Dan Retribusi</option>
                            <option>Alokasi Dana Desa</option>
                            <option>Kesalahan Belanja Tahun sebelum nya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jumlah</label><br>
                        <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Status Pendapatan</label><br>
                        <select name="statusPendapatan" class="form-control" required>
                            <option>- Silahkan Pilih Status Pendapatan -</option>
                            <option>Realisasi</option>
                            <option>Anggaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tahun</label><br>
                        <input type="number" name="tahun" class="form-control" placeholder="Masukkan Tahun" required>
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