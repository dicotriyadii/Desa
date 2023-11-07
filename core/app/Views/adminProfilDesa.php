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
              <div class="card-footer" style="text-align:left;background-color:white;margin-top:25px;">
                <?php
                if($data == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilWilayah" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Profil Wilayah Desa</a>
                <?php
                }else{?>
                  <h3 style="color:green;">Profil Desa Sudah Di Simpan Dalam Sistem</h3>
                <?php
                }
                ?>
              </div>
              <div class="modal fade" id="modalProfilWilayah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Wilayah Desa</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="ProsesTambahProfilDesa" method="POST"  enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Tahun</label><br>
                              <input type="text" class="form-control" name="tahun" placeholder="Masukkan Tahun" required>
                              <label for="exampleFormControlInput1">Tahun Pembentukan</label><br>
                              <input type="text" class="form-control" name="tahunPembentukan" placeholder="Masukkan Tahun Pembentukan" required>
                              <label for="exampleFormControlInput1">Luas Desa</label><br>
                              <input type="text" class="form-control" name="luasDesa" placeholder="Masukkan Luas Desa" required>
                              <label for="exampleFormControlInput1">Penetapan Batas</label><br>
                              <input type="text" class="form-control" name="penetapanBatas" placeholder="Masukkan Penetapan Batas" required>
                              <label for="exampleFormControlInput1">Dasar Hukum Peraturan Desa</label><br>
                              <input type="text" class="form-control" name="dasarHukumPerdes" placeholder="Masukkan Dasar Hukum Peraturan Desa" required>
                              <label for="exampleFormControlInput1">Dasar Hukum Peraturan Daerah</label><br>
                              <input type="text" class="form-control" name="dasarHukumPerda" placeholder="Masukkan Dasar Hukum Peraturan Daerah" required>
                              <label for="exampleFormControlInput1">Peta Wilayah</label><br>
                              <input type="text" class="form-control" name="petaWilayah" placeholder="Masukkan Peta Wilayah" required>
                              <label for="exampleFormControlInput1">Kordinat</label><br>
                              <input type="text" class="form-control" name="koordinat" placeholder="Masukkan Koordinat" required>
                              <label for="exampleFormControlInput1">Tipologi</label><br>
                              <input type="text" class="form-control" name="tipologi" placeholder="Masukkan Tipologi" required>
                              <label for="exampleFormControlInput1">Klasifikasi</label><br>
                              <input type="text" class="form-control" name="klasifikasi" placeholder="Masukkan Klasifikasi" required>
                              <label for="exampleFormControlInput1">Kategori</label><br>
                              <input type="text" class="form-control" name="kategori" placeholder="Masukkan Kategori" required>
                              <label for="exampleFormControlInput1">Batas Wilayah Utara</label><br>
                              <input type="text" class="form-control" name="batasWilayahUtara" placeholder="Masukkan Batas Wilayah Utara" required>
                              <label for="exampleFormControlInput1">Batas Wilayah Selatan</label><br>
                              <input type="text" class="form-control" name="batasWilayahSelatan" placeholder="Masukkan Batas Wilayah Selatan" required>
                              <label for="exampleFormControlInput1">Batas Wilayah Timur</label><br>
                              <input type="text" class="form-control" name="batasWilayahTimur" placeholder="Masukkan Batas Wilayah Timur" required>
                              <label for="exampleFormControlInput1">Batas Wilayah Barat</label><br>
                              <input type="text" class="form-control" name="batasWilayahBarat" placeholder="Masukkan Batas Wilayah Barat" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Tambah Profil Desa</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div class="card-body">
                <h1>Profil Desa</h1>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tahun</th>
                    <th>Nama Desa</th>
                    <th>Nama Kecamatan</th>
                    <th>Luas Desa</th>
                    <th>Batas Wilayah Utara</th>
                    <th>Batas Wilayah Selatan</th>
                    <th>Batas Wilayah Timur</th>
                    <th>Batas Wilayah Barat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($data as $d){
                    ?>
                  <tr>
                    <td><?=$d['tahun']?></td>
                    <td><?=$d['namaDesa']?></td>
                    <td><?=$d['namaKecamatan']?></td>
                    <td><?=$d['luasDesa']?></td>
                    <td><?=$d['batasWilayahUtara']?></td>
                    <td><?=$d['batasWilayahSelatan']?></td>
                    <td><?=$d['batasWilayahTimur']?></td>
                    <td><?=$d['batasWilayahBarat']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilDesa" style="color:green;">Edit</a>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilDesa2" style="color:green;">Selengkapnya</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Desa</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilDesa" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['idProfilDesa']?>" name="idProfilDesa"hidden> 
                                <label for="exampleFormControlInput1">Tahun</label><br>
                                <input type="text" class="form-control" name="tahun" value="<?= $d['tahun']?>" required>
                                <label for="exampleFormControlInput1">Tahun Pembentukan</label><br>
                                <input type="text" class="form-control" name="tahunPembentukan" value="<?= $d['tahunPembentukan']?>" required>
                                <label for="exampleFormControlInput1">Luas Desa</label><br>
                                <input type="text" class="form-control" name="luasDesa" value="<?= $d['luasDesa']?>" required>
                                <label for="exampleFormControlInput1">Penetapan Batas</label><br>
                                <input type="text" class="form-control" name="penetapanBatas" value="<?= $d['penetapanBatas']?>" required>
                                <label for="exampleFormControlInput1">Dasar Hukum Peraturan Desa</label><br>
                                <input type="text" class="form-control" name="dasarHukumPerdes" value="<?= $d['dasarHukumPerdes']?>" required>
                                <label for="exampleFormControlInput1">Dasar Hukum Peraturan Daerah</label><br>
                                <input type="text" class="form-control" name="dasarHukumPerda" value="<?= $d['dasarHukumPerda']?>" required>
                                <label for="exampleFormControlInput1">Peta Wilayah</label><br>
                                <input type="text" class="form-control" name="petaWilayah" value="<?= $d['petaWilayah']?>" required>
                                <label for="exampleFormControlInput1">Kordinat</label><br>
                                <input type="text" class="form-control" name="koordinat" value="<?= $d['koordinat']?>" required>
                                <label for="exampleFormControlInput1">Tipologi</label><br>
                                <input type="text" class="form-control" name="tipologi" value="<?= $d['tipologi']?>" required>
                                <label for="exampleFormControlInput1">Klasifikasi</label><br>
                                <input type="text" class="form-control" name="klasifikasi" value="<?= $d['klasifikasi']?>" required>
                                <label for="exampleFormControlInput1">Kategori</label><br>
                                <input type="text" class="form-control" name="kategori" value="<?= $d['kategori']?>" required>
                                <label for="exampleFormControlInput1">Batas Wilayah Utara</label><br>
                                <input type="text" class="form-control" name="batasWilayahUtara" value="<?= $d['batasWilayahUtara']?>" required>
                                <label for="exampleFormControlInput1">Batas Wilayah Selatan</label><br>
                                <input type="text" class="form-control" name="batasWilayahSelatan" value="<?= $d['batasWilayahSelatan']?>" required>
                                <label for="exampleFormControlInput1">Batas Wilayah Timur</label><br>
                                <input type="text" class="form-control" name="batasWilayahTimur" value="<?= $d['batasWilayahTimur']?>" required>
                                <label for="exampleFormControlInput1">Batas Wilayah Barat</label><br>
                                <input type="text" class="form-control" name="batasWilayahBarat" value="<?= $d['batasWilayahBarat']?>" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Edit Data</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="modalEditProfilDesa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Profil Desa Secara Lengkap</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            <input type="text" value="<?=$d['idProfilDesa']?>" name="idProfilDesa"hidden> 
                                <label for="exampleFormControlInput1">Nama Desa</label><br>
                                <input type="text" class="form-control" name="namaDesa" value="<?= $d['namaDesa']?>" readOnly>
                                <label for="exampleFormControlInput1">Nama Kecamatan</label><br>
                                <input type="text" class="form-control" name="namaKecamatan" value="<?= $d['namaKecamatan']?>" readOnly>
                                <label for="exampleFormControlInput1">Nama Kabupaten</label><br>
                                <input type="text" class="form-control" name="namaKabupaten" value="<?= $d['namaKabupaten']?>" readOnly>
                                <label for="exampleFormControlInput1">Nama Provinsi</label><br>
                                <input type="text" class="form-control" name="namaProvinsi" value="<?= $d['namaProvinsi']?>" readOnly>
                                <label for="exampleFormControlInput1">Tahun Pembentukan</label><br>
                                <input type="text" class="form-control" name="tahunPembentukan" value="<?= $d['tahunPembentukan']?>" readOnly>
                                <label for="exampleFormControlInput1">Luas Desa</label><br>
                                <input type="text" class="form-control" name="luasDesa" value="<?= $d['luasDesa']?>" readOnly>
                                <label for="exampleFormControlInput1">Penetapan Batas</label><br>
                                <input type="text" class="form-control" name="penetapanBatas" value="<?= $d['penetapanBatas']?>" readOnly>
                                <label for="exampleFormControlInput1">Dasar Hukum Peraturan Desa</label><br>
                                <input type="text" class="form-control" name="dasarHukumPerdes" value="<?= $d['dasarHukumPerdes']?>" readOnly>
                                <label for="exampleFormControlInput1">Dasar Hukum Peraturan Daerah</label><br>
                                <input type="text" class="form-control" name="dasarHukumPerda" value="<?= $d['dasarHukumPerda']?>" readOnly>
                                <label for="exampleFormControlInput1">Peta Wilayah</label><br>
                                <input type="text" class="form-control" name="petaWilayah" value="<?= $d['petaWilayah']?>" readOnly>
                                <label for="exampleFormControlInput1">Kordinat</label><br>
                                <input type="text" class="form-control" name="koordinat" value="<?= $d['koordinat']?>" readOnly>
                                <label for="exampleFormControlInput1">Tipologi</label><br>
                                <input type="text" class="form-control" name="tipologi" value="<?= $d['tipologi']?>" readOnly>
                                <label for="exampleFormControlInput1">Klasifikasi</label><br>
                                <input type="text" class="form-control" name="klasifikasi" value="<?= $d['klasifikasi']?>" readOnly>
                                <label for="exampleFormControlInput1">Kategori</label><br>
                                <input type="text" class="form-control" name="kategori" value="<?= $d['kategori']?>" readOnly>
                                <label for="exampleFormControlInput1">Batas Wilayah Utara</label><br>
                                <input type="text" class="form-control" name="batasWilayahUtara" value="<?= $d['batasWilayahUtara']?>" readOnly>
                                <label for="exampleFormControlInput1">Batas Wilayah Selatan</label><br>
                                <input type="text" class="form-control" name="batasWilayahSelatan" value="<?= $d['batasWilayahSelatan']?>" readOnly>
                                <label for="exampleFormControlInput1">Batas Wilayah Timur</label><br>
                                <input type="text" class="form-control" name="batasWilayahTimur" value="<?= $d['batasWilayahTimur']?>" readOnly>
                                <label for="exampleFormControlInput1">Batas Wilayah Barat</label><br>
                                <input type="text" class="form-control" name="batasWilayahBarat" value="<?= $d['batasWilayahBarat']?>" readOnly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                    }
                  ?>
                  </tbody>
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