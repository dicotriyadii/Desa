<?php
  require('AEditHeader.php');
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
            <h1>Detail Data Warga Negara</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
          <form class="form-horizontal" action="ProsesTambahDusun" method="POST"  enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <?php
                  foreach($data as $d){
                ?>
                <h1><?=$d['namaWarga']?></h1><br>
                <div class="form-group">
                <table width="100%" cellpadding="0" cellspacing="0" border="0px solid black" >
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Nomor Kartu Keluarga</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['nomorKartuKeluarga']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Jenis Kelamin</td>
                    <td style="padding:5px; width:5%; " align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['jenisKelamin']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Tanggal Lahir</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['tanggalLahir']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Pendidikan Terakhir</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['pendidikanTerakhir']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Umur</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['umur']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Status Keluarga</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['statusKeluarga']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Nomor BPJS</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['bpjs']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">RT</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['RT']?></td>
                  </tr>
                    <td style="padding:5px; width:45%; padding-top: 20px;">
                      <a href="<?=base_url()?>/resetPassword/<?=$d['nomorIndukKependudukan']?>?>" style="background-color:red;padding:8px 10px;border-radius:10px;color:white;">Reset Password</a>
                    </td>
                  </tr>
                  <?php
                  ?>
                </table>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" style="margin-top:80px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0px solid black" >
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Nomor Induk Kependudukan</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['nomorIndukKependudukan']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Status Kawin</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['statusKawin']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Tempat Lahir</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['tempatLahir']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Agama</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['agama']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Pendidikan Ditempuh</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:55%; font-size:13px;" align="left"><?=$d['pendidikanDitempuh']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Golongan Darah</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['golDarah']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Status</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left" ><?=$d['status']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Penghasilan Per Bulan</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=rupiah($d['penghasilan'])?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">RW</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['RW']?></td>
                  </tr>
                </table>
                </div>
                <?php
                  }
                  ?>
              </div>
            </div>
          </div>

          </form>
          <div class="card-body">
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<?php
  require('AEditFooter.php');
?>  