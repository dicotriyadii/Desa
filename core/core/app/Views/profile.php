<?php
  $session  = session();
  $status   = $session->get('status');
  $nama     = $session->get('nama');
  $hakAkses = $session->get('hakAkses');
  $status   = $session->get('status');
  $nik      = $session->get('nik');
  if($status != 'login'){
    return redirect()->to(base_url().'/login');
  }
  function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Website Desa</title>
  <link href="/../../assets/images/LogoDeliSerdang2.png" rel="icon">
  <link href="/../../assets/images/LogoDeliSerdang2.png" rel="apple-touch-icon">
  <link href="assets/images/LogoDeliSerdang2.png" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/../../assetsAdmin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/../../assetsAdmin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/../../assetsAdmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/../../assetsAdmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/../../assetsAdmin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/../../assetsAdmin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/../../assetsAdmin/dist/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hallo <?= $nama; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
          if($hakAkses == 'warga'){?>
          <li class="nav-item">
            <a href="<?= base_url()?>/admin" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/../profile/<?=$nik?>" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/permohonanSurat" class="nav-link">
              <i class="nav-icon fas fa-solid fa-plus"></i>
              <p>
                Permohonan Surat
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/keluar" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-left"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
          <?php
          }else if($hakAkses == 'superAdmin'){?>
          <li class="nav-item">
            <a href="<?= base_url()?>/admin" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/formTambahWarga" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Tambah Warga Negara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-chart-pie"></i>
              <p>
                Data Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminWargaNegara" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Negara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminWilayahAdministratif" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wilayah Administratif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPendidikanDalamKK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan Dalam KK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPendidikanDitempuh" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan Ditempuh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPekerjaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminAgama" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminJenisKelamin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Kelamin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminUmur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Umur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBPJS" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BPJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBantuanSosial" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bantuan Sosial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-info"></i>
              <p>
                Informasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminArtikel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artikel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBerita" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita / Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminGaleriFoto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri Foto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPengumuman" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengumuman</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Profil Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminProfilWilayahDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Wilayah Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminSejarahDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sejarah Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-landmark"></i>
              <p>
                Pemerintah Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminVisiMisi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visi dan Misi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPemerintahDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemerintah Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPKK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PKK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminLPM" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LPM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminLayananDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan Desa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminDanaDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dana Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-sitemap"></i>
              <p>
                Regulasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminProdukHukum" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk Hukum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminInformasiPublik" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informasi Publik</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-wrench"></i>
              <p>
                Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminCarousel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Carousel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/formRubahTema" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rubah Warna Website</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminKontak" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kontak</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminDataDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/formTambahDusun" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Tambah Dusun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/adminManajemenPengguna" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Manajemen Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/keluar" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-left"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
          <?php
          }else{?>
          <li class="nav-item">
            <a href="<?= base_url()?>/admin" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/formTambahWarga" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Tambah Warga Negara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-chart-pie"></i>
              <p>
                Data Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminWargaNegara" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga Negara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminWilayahAdministratif" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wilayah Administratif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPendidikanDalamKK" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan Dalam KK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPendidikanDitempuh" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pendidikan Ditempuh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPekerjaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pekerjaan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminAgama" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Agama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminJenisKelamin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Kelamin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminUmur" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Umur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBPJS" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BPJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBantuanSosial" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bantuan Sosial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-info"></i>
              <p>
                Informasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminArtikel" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artikel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBerita" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminGaleriFoto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Galeri Foto</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-landmark"></i>
              <p>
                Pemerintah Desa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminLayananDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan Desa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url()?>/keluar" class="nav-link">
              <i class="nav-icon fas fa-solid fa-arrow-left"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
          <?php
          }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

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
                  foreach($dataWarga as $d){
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
                    <td style="padding:5px; width:45%; font-weight:bold;">Desa</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['desa']?></td>
                  </tr>

                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">RT</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['RT']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">Kecamatan</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['kecamatan']?></td>
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
                    <td style="padding:5px; width:45%; font-weight:bold;">Dusun</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['dusun']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%; font-weight:bold;">RW</td>
                    <td style="padding:5px; width:5%;" align="center">:</td>
                    <td style="padding:5px; width:50%; font-size:13px;" align="left"><?=$d['RW']?></td>
                  </tr>
                  <tr>
                    <td style="padding:5px; width:45%;" colspan:'3'>
                      <a href=""data-toggle="modal" data-target="#gantiPassword" style="background-color:red;padding:8px 10px;border-radius:10px;color:white;">Ganti Password</a>
                    </td>
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
<!-- #modal -->
<div class="modal fade" id="gantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="../ProsesGantiPassword" method="POST"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password Lama</label><br>
                        <input type="text" name="passwordLama" class="form-control" placeholder="Masukkan Jenis Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password Baru</label><br>
                        <input type="text" name="passwordBaru" class="form-control" placeholder="Masukkan Jenis Kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- Sweet Alert -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<!-- jQuery -->
<script src="/../../assetsAdmin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/../../assetsAdmin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/../../assetsAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/../../assetsAdmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/../../assetsAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/../../assetsAdmin/plugins/jszip/jszip.min.js"></script>
<script src="/../../assetsAdmin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/../../assetsAdmin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/../../assetsAdmin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/../../assetsAdmin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/../../assetsAdmin/dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php 
$dataSession = $session->get('statusTambah');
$dataKeterangan = $session->get('keterangan');
if($dataSession == "Berhasil"){ 
?>
  <script> swal("Selamat ! ", "<?= $dataKeterangan; ?>", "success"); </script>
<?php 
$arraySession = ['statusTambah','keterangan'];
$session->remove($arraySession);
}else if($dataSession == "Gagal"){
?>
  <script> swal("Gagal ! ", "<?= $dataKeterangan; ?>", "error"); </script>
<?php 
$arraySession = ['statusTambah','keterangan'];
$session->remove($arraySession);
} 
?>
</body>
</html>