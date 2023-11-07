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
            <h1>Struktur Organisasi PKK</h1>
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
              <table width="70%" style="margin-top:2%;" border="0" >
                <tr>
                  <td width="30%" >
                    <div class="card-footer" style="text-align:left;background-color:white;">
                      <a href="" data-toggle="modal" data-target="#modalTambahPemerintahDesa" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Anggota PKK</a>
                      <a href="<?=base_url()?>/adminDasawisma"  style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Dasawisma</a>
                    </div>
                  </td>
                </tr>
              </table>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Jabatan</th>
                    <th>Gambar</th>
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
                    <td><?= $d['namaWarga'] ?></td>
                    <td><?= $d['jabatan'] ?></td>
                    <td><img src="foto/<?= $d['gambar']?>"style="width:50px;heigth:50px;"></td>
                    <td>
                      <a href="#" data-toggle="modal" data-target="#modalTambahPemerintahDesa<?= $d['idAnggotaPKK']?>" style="color:green;">Edit</a><br>
                      <a href="<?=base_url()?>/hapusAnggotaPKK/<?= $d['idAnggotaPKK']?>" style="color:red;">Hapus</a>
                    </td>
                  </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modalTambahPemerintahDesa<?= $d['idAnggotaPKK']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Anggota PKK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesEditTambahPKK" method="POST"  enctype="multipart/form-data">
                            <input type="text" value="<?=$d['idAnggotaPKK']?>" name="idAnggotaPKK" hidden> 
                            <label for="exampleInputEmail1">Nama Warga<span style="color:red;">*</span></span></label>
                            <select name="nik" class="form-control" data-live-search="true">
                              <option value="<?= $d['nik'] ?>"> <?= $d['nik'] ?> | <?= $d['namaWarga'] ?> </option>
                              <?php
                              foreach($dataWarga as $dw){?>
                              <option value="<?=$dw['nomorIndukKependudukan']?>"><?=$dw['nomorIndukKependudukan']?> | <?=$dw['namaWarga']?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <label for="exampleInputEmail1">Jabatan<span style="color:red;">*</span></label>
                            <select name="jabatan" class="form-control" data-live-search="true">
                              <option value="<?= $d['jabatan'] ?>"> <?= $d['jabatan'] ?> </option>
                              <option value="ketua"> Ketua </option>
                              <option value="wakil ketua"> Wakil Ketua </option>
                              <option value="sekretaris"> Sekretaris </option>
                              <option value="wakil sekretaris"> Wakil Sekretaris </option>
                              <option value="bendahara"> Bendahara </option>
                              <option value="wakil bendahara"> Wakil Bendahara </option>
                              <option value="ketua pokja I"> Ketua POKJA I </option>
                              <option value="sekretaris pokja I"> Sekretaris POKJA I </option>
                              <option value="ketua pokja II"> Ketua POKJA II </option>
                              <option value="sekretaris pokja II"> Sekretaris POKJA II </option>
                              <option value="ketua pokja III"> Ketua POKJA III </option>
                              <option value="sekretaris pokja III"> Sekretaris POKJA III </option>
                              <option value="ketua pokja IV"> Ketua POKJA IV </option>
                              <option value="sekretaris pokja VI"> Sekretaris POKJA VI </option>
                              <option value="anggota pokja I"> Anggota POKJA I </option>
                              <option value="anggota pokja II"> Anggota POKJA II </option>
                              <option value="anggota pokja III"> Anggota POKJA III </option>
                              <option value="anggota pokja IV"> Anggota POKJA VI </option>
                              <option value="dasawisma"> Dasawisma </option>
                            </select>
                            <label for="exampleInputEmail1">Dasawisma<br><span style="color:red;font-size:10px;">*form diisi apabila jabatan yang di pilih dasawisma</span></span></label>
                            <select name="kodeDasawisma" class="form-control" data-live-search="true">
                              <option> - Silahkan Pilih Dasawisma - </option>
                              <?php
                              foreach($dataDasawisma as $ddw){?>
                              <option value="<?=$ddw['id']?>"><?=$ddw['nama_dasa_wisma']?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
                            <input type="file" name="gambar">
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
<div class="modal fade" id="modalTambahPemerintahDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah PKK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" action="ProsesTambahPKK" method="POST"  enctype="multipart/form-data">
          <label for="exampleInputEmail1">Nama Warga<span style="color:red;">*</span></span></label>
          <select name="nik" class="form-control selectpicker" data-live-search="true">
            <option> - Silahkan Pilih Warga - </option>
            <?php
            foreach($dataWarga as $dw){?>
            <option value="<?=$dw['nomorIndukKependudukan']?>"><?=$dw['nomorIndukKependudukan']?> | <?=$dw['namaWarga']?></option>
            <?php
            }
            ?>
          </select>
          <label for="exampleInputEmail1">Jabatan<span style="color:red;">*</span></label>
          <select name="jabatan" class="form-control selectpicker" data-live-search="true">
            <option> - Silahkan Pilih Jabatan - </option>
            <option value="ketua"> Ketua </option>
            <option value="wakil ketua"> Wakil Ketua </option>
            <option value="sekretaris"> Sekretaris </option>
            <option value="wakil sekretaris"> Wakil Sekretaris </option>
            <option value="bendahara"> Bendahara </option>
            <option value="wakil bendahara"> Wakil Bendahara </option>
            <option value="ketua pokja I"> Ketua POKJA I </option>
            <option value="sekretaris pokja I"> Sekretaris POKJA I </option>
            <option value="ketua pokja II"> Ketua POKJA II </option>
            <option value="sekretaris pokja II"> Sekretaris POKJA II </option>
            <option value="ketua pokja III"> Ketua POKJA III </option>
            <option value="sekretaris pokja III"> Sekretaris POKJA III </option>
            <option value="ketua pokja IV"> Ketua POKJA IV </option>
            <option value="sekretaris pokja VI"> Sekretaris POKJA VI </option>
            <option value="anggota pokja I"> Anggota POKJA I </option>
            <option value="anggota pokja II"> Anggota POKJA II </option>
            <option value="anggota pokja III"> Anggota POKJA III </option>
            <option value="anggota pokja IV"> Anggota POKJA VI </option>
            <option value="dasawisma"> Dasawisma </option>
          </select>
          <label for="exampleInputEmail1">Dasawisma<br><span style="color:red;font-size:10px;">*form diisi apabila jabatan yang di pilih dasawisma</span></span></label>
          <select name="kodeDasawisma" class="form-control selectpicker" data-live-search="true">
            <option> - Silahkan Pilih Dasawisma - </option>
            <?php
            foreach($dataDasawisma as $ddw){?>
            <option value="<?=$ddw['id']?>"><?=$ddw['nama_dasa_wisma']?></option>
            <?php
            }
            ?>
          </select>
          <label for="exampleInputEmail1">Upload Gambar<span style="color:red;">*</span></span></label><br>
          <input type="file" name="gambar" required>
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