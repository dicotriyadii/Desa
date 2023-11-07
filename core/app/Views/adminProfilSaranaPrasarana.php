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
              <h1>Profil Sarana Prasarana</h1>
                <?php
                if($dataKantorDesa == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilKantorDesa" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Kantor Desa</a>
                <?php
                }
                if($dataKesehatan == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilKesehatan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Kesehatan</a>
                <?php
                }
                if($dataPendidikan == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilPendidikan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Pendidikan</a>
                <?php
                }
                if($dataPeribadatan == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilPeribadatan" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Peribadatan</a>
                <?php
                }
                if($dataTransportasi == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilTransportasi" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Teansportasi</a>
                <?php
                }
                if($dataAirBersih == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilAirBersih" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Air Bersih</a>
                <?php
                }
                if($dataIrigasi == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilIrigasi" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Irigasi</a>
                <?php
                }
                if($dataSanitasi == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilSanitasi" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Sanitasi</a>
                <?php
                }
                if($dataOlahraga == null){?>
                  <a href=""data-toggle="modal" data-target="#modalProfilOlahraga" style="background-color:green;padding:8px 10px;border-radius:10px;color:white;">Tambah Olahraga</a>
                <?php
                }
                ?>
              </div>
              <!-- Kantor Desa -->
              <div class="modal fade" id="modalProfilKantorDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Kantor Desa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilKantorDesa" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Sarana</label><br>
                          <input type="text" class="form-control" name="jenisSarana" placeholder="Masukkan Jenis Sarana" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="status" placeholder="Masukkan Status" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Kantor Desa</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Kantor Desa</h3>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Sarana</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataKantorDesa as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisSarana']?></td>
                    <td><?=$d['status']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilKantorDesa" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilKantorDesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Kantor Desa</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilKantorDesa" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Sarana</label><br>
                                <input type="text" class="form-control" name="jenisSarana" value="<?= $d['jenisSarana']?>" required>
                                <label for="exampleFormControlInput1">Status</label><br>
                                <input type="text" class="form-control" name="status" value="<?= $d['status']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Kesehatan -->
              <div class="modal fade" id="modalProfilKesehatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Kesehatan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilKesehatan" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Gedung</label><br>
                          <input type="text" class="form-control" name="jenisGedung" placeholder="Masukkan Jenis Gedung" required>
                          <label for="exampleFormControlInput1">Sewa</label><br>
                          <input type="text" class="form-control" name="sewa" placeholder="Masukkan Jumlah Sewa" required>
                          <label for="exampleFormControlInput1">Milik Sendiri</label><br>
                          <input type="text" class="form-control" name="milikSendiri" placeholder="Masukkan Jumlah Milik Sendiri" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Kesehatan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Kesehatan</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Prasarana</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataKesehatan as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisPrasarana']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilKesehatan" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilKesehatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Kesehatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilKesehatan" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis Prasaranan</label><br>
                                <input type="text" class="form-control" name="jenisPrasarana" value="<?= $d['jenisPrasarana']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Pendidikan -->
              <div class="modal fade" id="modalProfilPendidikan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Pendidikan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilPendidikan" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Gedung</label><br>
                          <input type="text" class="form-control" name="jenisGedung" placeholder="Masukkan Jenis Gedung" required>
                          <label for="exampleFormControlInput1">Sewa</label><br>
                          <input type="text" class="form-control" name="sewa" placeholder="Masukkan Jumlah Sewa" required>
                          <label for="exampleFormControlInput1">Milik Sendiri</label><br>
                          <input type="text" class="form-control" name="milikSendiri" placeholder="Masukkan Jumlah Milik Sendiri" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Pendidikan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Pendidikan</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Gedung</th>
                    <th>Sewa</th>
                    <th>Milik Sendiri</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataPendidikan as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisGedung']?></td>
                    <td><?=$d['sewa']?></td>
                    <td><?=$d['milikSendiri']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilPendidikan" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilPendidikan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Pendidikan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilPendidikan" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis Gedung</label><br>
                                <input type="text" class="form-control" name="jenisGedung" value="<?= $d['jenisGedung']?>" required>
                                <label for="exampleFormControlInput1">sewa</label><br>
                                <input type="text" class="form-control" name="sewa" value="<?= $d['sewa']?>" required>
                                <label for="exampleFormControlInput1">Milik Sendiri</label><br>
                                <input type="text" class="form-control" name="milikSendiri" value="<?= $d['milikSendiri']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Peribadatan -->
              <div class="modal fade" id="modalProfilPeribadatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Peribadatan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilPeribadatan" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Tempat Ibadah</label><br>
                          <input type="text" class="form-control" name="jenisTempatIbadah" placeholder="Masukkan Jenis Tempat Ibadah" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Peribadatan</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Peribadatan</h3>
                <table id="example4" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Tempat Ibadah</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataPeribadatan as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisTempatIbadah']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilPeribadatan" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilPeribadatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Peribadatan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilPeribadatan" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Tempat Ibadah</label><br>
                                <input type="text" class="form-control" name="jenisTempatIbadah" value="<?= $d['jenisTempatIbadah']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Transportasi -->
              <div class="modal fade" id="modalProfilTransportasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Transportasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilTransportasi" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Sarana</label><br>
                          <input type="text" class="form-control" name="jenisSarana" placeholder="Masukkan Jenis Sarana" required>
                          <label for="exampleFormControlInput1">Kondisi Baik</label><br>
                          <input type="text" class="form-control" name="kondisiBaik" placeholder="Masukkan Kondisi" required>
                          <label for="exampleFormControlInput1">Kondisi Buruk</label><br>
                          <input type="text" class="form-control" name="kondisiBuruk" placeholder="Masukkan Kondisi" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Transportasi</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Transportasi</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Sarana</th>
                    <th>Kondisi Buruk</th>
                    <th>Kondisi Baik</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataTransportasi as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisSarana']?></td>
                    <td><?=$d['kondisiBuruk']?></td>
                    <td><?=$d['kondisiBaik']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilTransportasi" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilTransportasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Transportasi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilTransportasi" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Sarana</label><br>
                                <input type="text" class="form-control" name="jenisSarana" value="<?= $d['jenisSarana']?>" required>
                                <label for="exampleFormControlInput1">Kondisi Baik</label><br>
                                <input type="text" class="form-control" name="kondisiBaik" value="<?= $d['kondisiBaik']?>" required>
                                <label for="exampleFormControlInput1">Kondisi Buruk</label><br>
                                <input type="text" class="form-control" name="kondisiBuruk" value="<?= $d['kondisiBuruk']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Air Bersih -->
              <div class="modal fade" id="modalProfilAirBersih" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Air Bersih</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilAirBersih" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Air Bersih</label><br>
                          <input type="text" class="form-control" name="jenisAirBersih" placeholder="Masukkan Jenis Air Bersih" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Air Bersih</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Air Bersih</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Air Bersih</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataAirBersih as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisAirBersih']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilAirBersih" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilAirBersih" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Air Bersih</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilAirBersih" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Air Bersih</label><br>
                                <input type="text" class="form-control" name="jenisAirBersih" value="<?= $d['jenisAirBersih']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Irigasi -->
              <div class="modal fade" id="modalProfilIrigasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Irigasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilIrigasi" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Irigasi</label><br>
                          <input type="text" class="form-control" name="jenisIrigasi" placeholder="Masukkan Jenis Irigasi" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Irigasi</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Irigasi</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Irigasi</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataIrigasi as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisIrigasi']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilIrigasi" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilIrigasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Irigasi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilIrigasi" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Irigasi</label><br>
                                <input type="text" class="form-control" name="jenisIrigasi" value="<?= $d['jenisIrigasi']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Sanitasi -->
              <div class="modal fade" id="modalProfilSanitasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Sanitasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilSanitasi" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Sanitasi</label><br>
                          <input type="text" class="form-control" name="jenisSanitasi" placeholder="Masukkan Jenis Sanitasi" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Sanitasi</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Sanitasi</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Sanitasi</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataSanitasi as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisSanitasi']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilSanitasi" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilSanitasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Sanitasi</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilSanitasi" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Sanitasi</label><br>
                                <input type="text" class="form-control" name="jenisSanitasi" value="<?= $d['jenisSanitasi']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
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
                  <?php
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- Olahraga -->
              <div class="modal fade" id="modalProfilOlahraga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Profil Olahraga</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" action="ProsesTambahProfilOlahraga" method="POST"  enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Jenis Lapangan</label><br>
                          <input type="text" class="form-control" name="jenisLapangan" placeholder="Masukkan Jenis Lapangan" required>
                          <label for="exampleFormControlInput1">Jumlah</label><br>
                          <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Tambah Profil Olahraga</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <h3>Olahraga</h3>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Jenis Lapangan</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach($dataOlahraga as $d){
                    ?>
                  <tr>
                    <td><?=$d['jenisLapangan']?></td>
                    <td><?=$d['jumlah']?></td>
                    <td>
                      <a href=""data-toggle="modal" data-target="#modalEditProfilOlahraga" style="color:green;">Edit</a>
                    </td>
                  </tr>
                    <div class="modal fade" id="modalEditProfilOlahraga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Profil Olahraga</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" action="ProsesEditTambahProfilOlahraga" method="POST"  enctype="multipart/form-data">
                              <div class="form-group">
                                <input type="text" value="<?=$d['id']?>" name="id"hidden> 
                                <label for="exampleFormControlInput1">Jenis  Lapangan</label><br>
                                <input type="text" class="form-control" name="jenisLapangan" value="<?= $d['jenisLapangan']?>" required>
                                <label for="exampleFormControlInput1">Jumlah</label><br>
                                <input type="text" class="form-control" name="jumlah" value="<?= $d['jumlah']?>" required>
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