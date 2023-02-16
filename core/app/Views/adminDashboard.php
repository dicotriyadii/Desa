<?php
  require('AHeader.php');
  $status = $session->get('status');
  $hakAkses = $session->get('hakAkses');
  if($status != 'login'){
    return redirect()->to(base_url().'/login');
  }
?>   

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <?php
    if($hakAkses != 'warga'){?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner" style="background-color:green;">
                <h3><?=$dataSeluruhWarga?></h3>
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
                <h3><?=$dataLakiLaki?></h3>
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
                <h3><?=$dataPerempuan?></h3>
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
                <h3><?=$jumlahKartuKeluarga?></h3>
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
                <h3><?=$dataMeninggal?></h3>
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
                <h3><?=$jumlahBerpendidikan?></h3>
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
                <h3><?=$jumlahTidakBerpendidikan?></h3>
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
                <h3><?=$jumlahBekerja?></h3>
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
                <h3><?=$jumlahBPJS?></h3>
                <p>Warga yang <br> Memiliki BPJS</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-hand-holding-medical"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner" style="background-color:red;">
                <h3><?=$dataPenerimaBansos?></h3>
                <p>Warga Penerima <br> Bantuan Sosial</p>
              </div>
              <div class="icon">
                <i class="fas fa-solid fa-dollar-sign"></i>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Kritik</th>
                    <th>Saran</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=0;
                  foreach($dataKritikSaran as $d){
                  $no++;
                  ?> 
                  <tr>
                    <td><?=$no;?></td>
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
    }else{?>
    <?php
    if($jumlahPermohonanSelesai == 0 && $jumlahPermohonanPending == 0 && $jumlahPermohonanProses == 0 && $jumlahPermohonanDitolak == 0){?>
      <section class="content">
        <div class="container-fluid" >
          <div class="row" style="padding:0px 10px 0px 10px;">
            <div style="border:0px solid black; width:100%; height:150px; background-color:grey; opacity: 0.5; border-radius:10px;">
              <h1 style="text-align:center; margin-top:4%;">TIDAK ADA MELAKUKAN PERMOHONAN SURAT</h1>    
            </div>
        </div>
      </section>
    <?php
    }else{?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner" style="background-color:gray;">
                <h3><?=$jumlahPermohonanPending?></h3>
                <p>Permohonan <br>Pending</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner" style="background-color:orange;">
                <h3><?=$jumlahPermohonanProses?></h3>
                <p>Permohonan <br>Dalam Proses</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner" style="background-color:green; color:white;">
                <h3><?=$jumlahPermohonanSelesai?></h3>
                <p>Permohonan <br> Selesai</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner" style="background-color:red; color:white;">
                <h3><?=$jumlahPermohonanDitolak?></h3>
                <p>Permohonan <br> Ditolak</p>
              </div>
            </div>
          </div>
      </div>
    </section>    
    <?php
    }
    }
    ?>
  </div>
</div>

<?php
  require('AFooter.php');
?>   

