<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Desa <?=$dataDesa[0]['namaDesa']?></title>
    <link href="../assets/images/LogoDeliSerdang2.png" rel="icon">
    <link href="../assets/images/LogoDeliSerdang2.png" rel="apple-touch-icon">
    <!--Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
    <!--Bootstrap Select-->
    <link rel="stylesheet" href="../assets/vendors/bootstrap-select/css/bootstrap-select.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="../assets/vendors/owl.carousel/owl.carousel.css">
    <!--Magnific Popup-->
    <link rel="stylesheet" href="../assets/vendors/magnific-popup/magnific-popup.css">
    
    <!--Theme Styles-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/theme.css">

    <!-- Chart Js -->
    <script type="text/javascript" src="../chart/dist/Chart.js"></script>
    
     <!-- DataTables -->
    <link rel="stylesheet" href="../assetsAdmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetsAdmin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetsAdmin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    <!--[if lt IE 9]>
        
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   
    <nav class="navbar navbar-default navbar-static-top navbar2" style="background-color:<?=$tema[0]['warna']?>">
    <!-- <nav class="navbar navbar-default navbar-static-top navbar2"> -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>            
            <div class="collapse navbar-collapse" id="mainNav">                
                <ul class="nav navbar-nav">
                    <li><a href="<?=base_url();?>">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil Desa</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url();?>/profilWilayahDesa">Profil Wilayah Desa</a></li>
                            <li><a href="<?=base_url();?>/sejarahDesa">Sejarah Desa</a></li>
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemerintah Desa</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=base_url();?>/visiMisi">Visi dan Misi</a></li>
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
    
    <header class="row header1">
        <div class="container">
            <div class="logo pull-left">
            <a class="navbar-brand" href="#"><img src="../assets/images/LogoDeliSerdang2.png" alt="" style="heigth:20px;"><span style="font-size:20px;">&nbsp;<?= $dataDesa[0]['namaDesa']?></span></a>
            </div>
            <?php 
            foreach($dataKontak as $dk){
            ?>
            <div class="pull-right emergency-contact">
                <div class="pull-left">
                    <span><i class="fa fa-envelope-o"></i></span>
                    <div class="infos_col">
                        <h6>Kirim Ke email kami</h6>
                        <a href="mailto:<?= $dk['emailKontak']?>"><h5><?= $dk['emailKontak']?></h5></a>
                    </div>
                </div>
                <div class="pull-left">
                    <span class="rotate"><i class="fa fa-phone"></i></span>
                    <div class="infos_col">
                        <h6>Hubungi Kami</h6>
                        <h4><?= $dk['nomorKontak']?></h4>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>        
    </header>