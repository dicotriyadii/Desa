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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Website Desa</title>
  <link href="../assets/images/LogoDeliSerdang2.png" rel="icon">
  <link href="../assets/images/LogoDeliSerdang2.png" rel="apple-touch-icon">
  <link href="assets/images/LogoDeliSerdang2.png" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assetsAdmin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assetsAdmin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assetsAdmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assetsAdmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assetsAdmin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assetsAdmin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
  <!-- CKEditor -->
  <script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

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
          <img src="../assetsAdmin/dist/img/profile.jpg" class="img-circle elevation-2" alt="User Image">
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
            <a href="<?= base_url()?>/../index.php/profile/<?=$nik?>" class="nav-link">
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
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPemberitahuan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pemberitahuan</p>
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
              <li class="nav-item">
                <a href="<?= base_url()?>/adminPotensiDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Potensi Desa</p>
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
                <a href="<?= base_url()?>/adminBPD" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BPD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url()?>/adminBumdes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BUMDES</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?= base_url()?>/adminLayananDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan Desa</p>
                </a>
              </li> -->
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
                Publikasi
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
              <!-- <li class="nav-item">
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
              </li> -->
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
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url()?>/adminLayananDesa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Layanan Desa</p>
                </a>
              </li>
            </ul> -->
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