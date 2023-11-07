<?php
  require('AHeader.php');
  $status = $session->get('status');
  $jabatan = $session->get('jabatan');
  if($status != 'login'){
    return redirect()->to(base_url().'/login');
  }
?>   


  <div class="content-wrapper">
    <!-- Rekapitulasi -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Website Desa Digital <br> Desa <?=$dataDesa[0]['namaDesa']?> Kecamatan <?=$dataDesa[0]['namaKecamatan']?></h1>
          </div>
        </div>
      </div>
    </div>

    <?php
    if($jabatan == 'operator desa'){?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner" style="background-color:green;">
                <h3><?=$jumlahWarga?></h3>
                <p>Jumlah <br> Keseluruhan Warga</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-city"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner" style="background-color:grey;">
                <h3><?=$jumlahLaki?></h3>
                <p>Jumlah Keseluruhan <br> Warga Laki-Laki</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-mars"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner" style="background-color:yellow;">
                <h3><?=$jumlahPerempuan?></h3>
                <p>Jumlah Keseluruhan <br> Warga Perempuan</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-venus"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner" style="background-color:lightblue;">
                <h3><?=$jumlahKeluarga?></h3>
                <p>Jumlah<br> Kartu Keluarga</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-users"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner" style="background-color:red;">
                <h3><?=$jumlahSedangPendidikan?></h3>
                <p>Jumlah Warga <br> yang sudah Meninggal</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-skull"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$jumlahBekerja?></h3>
                <p>Warga yang <br> Berpendidikan</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user-graduate"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$jumlahTidakBekerja?></h3>
                <p>Warga yang <br> Tidak Berpendidikan</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-ban"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$jumlahPenggunaBPJS?></h3>
                <p>Warga yang <br> Bekerja</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-briefcase"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?=$jumlahTidakBekerja?></h3>
                <p>Warga yang <br> Tidak Bekerja</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-user-slash"></i>
              </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner" style="background-color:green;">
                <h3><?=$jumlahPenggunaBPJS?></h3>
                <p>Warga yang <br> Memiliki BPJS</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-hand-holding-medical"></i>
              </div>
            </div>
          </div>
      </div>
    </section>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kritik Dan Saran Warga Desa </h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kritik</th>
                    <th>Saran</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=0;
                  foreach($kritikSaran as $d){
                  $no++;
                  ?> 
                  <tr>
                    <td><?=$no;?></td>
                    <td><?= $d['tanggal'];?></td>
                    <td><?= $d['nama'];?></td>
                    <td><?= $d['email'];?></td>
                    <td><?= $d['kritik'];?></td>
                    <td><?= $d['saran'];?></td>
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

    <?php
    }
    ?>
  </div>
</div>

<?php
  require('AFooter.php');
?>   

