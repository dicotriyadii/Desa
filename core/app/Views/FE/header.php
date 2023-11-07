<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$dataDesa[0]['namaDesa']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/LogoDeliSerdang.png" rel="icon">
  <link href="assets/LogoDeliSerdang.png" rel="apple-touch-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  
  <link href="assets/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/assets/css/main.css" rel="stylesheet">
  <link href="assets_admin_baru/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

</head>
<body>
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/LogoDeliSerdang.png" alt="">
        <h1><?=$dataDesa[0]['namaDesa']?></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?=base_url()?>" class="active">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <!-- <li><a href="<?=base_url()?>/profilWilayah">Profil Wilayah</a></li> -->
              <!-- <li><a href="<?=base_url()?>/sejarah">Sejarah</a></li> -->
              <li class="dropdown"><a href="#"><span>Pemerintah Desa</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="<?=base_url()?>/visiMisi">Visi dan Misi</a></li>
                  <li><a href="<?=base_url()?>/strukturPemerintah">Pemerintah Desa</a></li>
                  <li><a href="<?=base_url()?>/pkk">PKK</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?=base_url()?>/artikelKelurahan">Artikel</a></li>
              <li><a href="<?=base_url()?>/beritaKelurahan">Berita</a></li>
              <li><a href="<?=base_url()?>/galeriKelurahan">Galeri Foto</a></li>
              <li><a href="<?=base_url()?>/pengumuman">Pengumuman</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Rekapitulasi Data</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?=base_url()?>/pendidikanDalamKK">Pendidikan Dalam Kartu Keluarga</a></li>
              <li><a href="<?=base_url()?>/pekerjaan">Pekerjaan</a></li>
              <li><a href="<?=base_url()?>/agama">Agama</a></li>
              <li><a href="<?=base_url()?>/jenisKelamin">Jenis Kelamin</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>PPID Desa</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?=base_url()?>/regulasi">Regulasi</a></li>
              <li><a href="<?=base_url()?>/permohonanInformasiPublik">Permohonan Informasi Publik</a></li>
              <li class="dropdown"><a href="#"><span>Daftar Informasi Publik</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="<?=base_url()?>/informasiPublikSetiapSaat">Setiap Saat</a></li>
                  <li><a href="<?=base_url()?>/informasiPublikBerkala">Berkala</a></li>
                  <li><a href="<?=base_url()?>/informasiPublikSertaMerta">Serta Merta</a></li>
                  <li><a href="<?=base_url()?>/informasiPublikDikecualikan">Dikecualikan</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Publikasi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="<?=base_url()?>/produkHukumKelurahan">Produk Hukum</a></li>
              <!-- <li><a href="<?=base_url()?>/informasiPublikKelurahan">Informasi Publik</a></li> -->
            </ul>
          </li>
          <li><a href="<?=base_url()?>/kontak">Kontak</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->