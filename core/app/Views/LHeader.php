<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi <?=$dataDesa[0]['namaDesa']?></title>
    <link href="assets/images/LogoDeliSerdang2.png" rel="icon">
    <link href="assets/images/LogoDeliSerdang2.png" rel="apple-touch-icon">
    <!--Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assetsAdmin/plugins/fontawesome-free/css/all.min.css">

    <!--Bootstrap-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="assets/vendors/owl.carousel/owl.carousel.css">
    <!--Magnific Popup-->
    <link rel="stylesheet" href="assets/vendors/magnific-popup/magnific-popup.css">
    
    <!--Theme Styles-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/theme.css">
    
    <!-- Carousel -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">

</head>
<body>
   
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="assets/images/LogoDeliSerdang2.png" alt="" style="heigth:20px;"><span style="font-size:20px;">&nbsp;<?= $dataDesa[0]['namaDesa']?></span></a>
            </div>            
            <div class="collapse navbar-collapse" id="mainNav">
                <a href="<?=base_url()?>/loginAdmin" class="volunteer-link btn-primary btn-outline hidden-sm hidden-xs pull-right">Login</a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url();?>">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil Desa</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url();?>/profilWilayahDesa">Profil Wilayah Desa</a></li>
                            <li><a href="<?=base_url();?>/sejarahDesa">Sejarah Desa</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemerintah Desa</a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?=base_url();?>/visiMisi">Visi Dan Misi</a></li>
                                    <li><a href="<?=base_url();?>/pemerintahDesa">Pemerintah Desa</a></li>
                                    <li><a href="<?=base_url();?>/pkk">PKK</a></li>
                                    <li><a href="<?=base_url();?>/lpm">LPM</a></li>
                                    <li><a href="<?=base_url();?>/bpd">BPD</a></li>
                                    <li><a href="<?=base_url();?>/bumdes">BUMDES</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url();?>/artikel">Artikel</a></li>
                            <li><a href="<?=base_url();?>/berita">Berita / Kegiatan</a></li>
                            <li><a href="<?=base_url();?>/galeri">Galeri Foto</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Desa</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url();?>/dataWilayahAdministrasi">Wilayah Administratif</a></li>
                            <li><a href="<?=base_url();?>/dataPendidikanDalamKK">Pendidikan Dalam KK</a></li>
                            <li><a href="<?=base_url();?>/dataPendidikanDitempuh">Pendidikan Ditempuh</a></li>
                            <li><a href="<?=base_url();?>/dataPekerjaan">Data Pekerjaan</a></li>
                            <li><a href="<?=base_url();?>/dataAgama">Data Agama</a></li>
                            <li><a href="<?=base_url();?>/dataJenisKelamin">Data Jenis Kelamin</a></li>
                            <li><a href="<?=base_url();?>/dataWargaNegara">Data Warga Negara</a></li>
                            <li><a href="<?=base_url();?>/danaDesa">Data Dana Desa</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Publikasi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url();?>/produkHukum">Produk Hukum</a></li>
                            <li><a href="<?=base_url();?>/informasiPublik">Informasi Publik</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=base_url();?>/petaDesa">Peta Desa</a>
                    </li>
                </ul>                
            </div>
        </div>
    </nav>
