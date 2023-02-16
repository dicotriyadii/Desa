<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi <?=$dataDesa[0]['namaDesa']?></title>
    <link href="../../assets/images/LogoDeliSerdang2.png" rel="icon">
    <link href="../../assets/images/LogoDeliSerdang2.png" rel="apple-touch-icon">

    <!--Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap-theme.min.css">
    <!--Bootstrap Select-->
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-select/css/bootstrap-select.min.css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!--Owl Carousel-->
    <link rel="stylesheet" href="../../assets/vendors/owl.carousel/owl.carousel.css">
    <!--Magnific Popup-->
    <link rel="stylesheet" href="../../assets/vendors/magnific-popup/magnific-popup.css">
    
    <!--Theme Styles-->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/theme.css">

    <!-- Chart Js -->
    <script type="text/javascript" src="../chart/dist/Chart.js"></script>
     <!-- DataTables -->
    <link rel="stylesheet" href="../../assetsAdmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assetsAdmin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assetsAdmin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
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
            <a class="navbar-brand" href="#"><img src="../../assets/images/LogoDeliSerdang2.png" alt="" style="heigth:20px;"><span style="font-size:20px;">&nbsp;<?= $dataDesa[0]['namaDesa']?></span></a>
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
    
    <section class="row blog-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post post-type-image single-post row">
                        <div class="row featured-contents">
                            <a href="single.html"><img src="../../berita/<?=$dataBerita[0]['gambarBerita']?>" alt="" style="height:450px;"></a>
                        </div>
                        <div class="row article-body">
                            <h3 class="post-title"><a href="single.html"><?=$dataBerita[0]['judulBerita']?></a></h3>
                            <ul class="post-meta nav">
                                <li class="post-date"><i class="fa fa-calendar-o"></i> <a href="#"><?=$dataBerita[0]['tanggalBerita']?></a></li>       
                                <li class="posted-by"><i class="fa fa-user"></i>posted by: <a href="#"><?=$dataBerita[0]['authorBerita']?></a></li>
                            </ul>
                            <div class="post-content row">
                                <p><?=$dataBerita[0]['keterangan']?></p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4 sidebar  post-sidebar">
                    <div class="row m0 widget widget-recent-posts">
                        <h4 class="widget-title">recent post</h4>
                        <?php
                        foreach($dataBerita1 as $db){
                        ?>
                        <div class="media recent-post">
                            <div class="media-left"><a href="single.html"><img src="../../berita/<?= $db['gambarBerita']?>" alt="" style="width:100px;"></a></div>
                            <div class="media-body">
                                <h5 class="title"><a href="<?=base_url()?>/detailBerita/<?=$db['idBerita']?>"><?= $db['judulBerita']?></a></h5>
                                <h5 class="date"><i class="fa fa-calendar-o"></i><a href="#"><?=$db['tanggalBerita']?></a></h5>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="row newsletter_signup">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Kritik & Saran</h4>
                    <p>Silahkan kirim kritik dan saran anda untuk kemajuan desa kita</p>
                </div>
                <form class="col-sm-7 form-inline newsletter_signup_form" action="index.php/ProsesKritikSaran" method="post">
                    <input type="text" name="namaWarga" class="form-control" placeholder="Masukkan Nama" style="width:500px; margin-bottom:10px;">
                    <input type="text" name="namaWarga" class="form-control" placeholder="Masukkan Email" style="width:500px; margin-bottom:10px;">
                    <textarea class="form-control" placeholder="Masukkan Kritik dan Saran" style="width:500px; height:100px; margin-bottom:10px;"></textarea>
                    <input type="submit" value="submit" class="btn-primary white">
                </form>
            </div>
        </div>
    </section>

<footer class="row footer" style="background-color:black; color:white;">
        <div class="container">
            <div class="row footer_sidebar">
                <div class="widget widget-contact col-sm-6 col-md-3">
                    <h6 class="label label-default widget-title">Kontak Desa <?=$dataDesa[0]['namaDesa']?></h6>
                    <address style="color:white;">
                        Kontak dan Sosial Media Desa <?=$dataDesa[0]['namaDesa']?> bisa di akses melalui kontak di bawah ini
                        <br><br>
                        <a class="social-media-icon" href="https://wa.me/<?=$dataKontak[0]['nomorKontak']?>"><span class="fab fa-whatsapp" style="color:white;font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.facebook.com/<?=$dataKontak[0]['facebookKontak']?>/"><span class="fab fa-facebook" style="color:white;font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.instagram.com/<?=$dataKontak[0]['instagramKontak']?>/"><span class="fab fa-instagram" style="color:white; font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                        <a class="social-media-icon" href="https://www.youtube.com/<?=$dataKontak[0]['youtubeKontak']?>/"><span class="fab fa-youtube" style="color:white; font-size:35px;">&nbsp;&nbsp;&nbsp;</span></a>
                    </address>
                </div>
                <div class="widget widget-recent-posts col-sm-6 col-md-3">
                    <h6 class="label label-default widget-title">Layanan Desa</h6>
                    <ul class="nav recent-posts" >
                        <li ><a href="<?=base_url();?>/dataWargaNegara" style="color:white;">Data Warga Negara</a></li>     
                        <li ><a href="<?=base_url();?>/loginWarga" style="color:white;">Permohonan Surat</a></li>     
                        <li ><a href="<?=base_url();?>/produkHukum" style="color:white;">Produk Hukum</a></li>
                        <li ><a href="<?=base_url();?>/informasiPublik" style="color:white;">Informasi Publik</a></li>          
                    </ul>
                </div>
                <div class="widget widget-recent-tweets col-sm-6 col-md-3">
                    <h6 class="label label-default widget-title" style="background-color:#dd482d;">Peta Desa</h6>
                    <div class="tweet m0">
                    <?=$dataDesa[0]['linkPetaDesa']?>
                    </div>
                </div>
            </div>
        </div>        
        <div class="row copyright_area m0">
            <div class="container">
                <div class="copy_inner row">
                    <div class="col-sm-7 copyright_text" style="color:white; width:1200px;">Copyright &copy; 2023 Dinas Komunikasi, Informatikan, Statistik dan Persandian Kabupaten Deli Serdang, Sumatera Utara. All Rights Reserved</div>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="../../assets/js/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <!--Google Map-->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="../../assets/js/gmaps.min.js"></script>
    <!--Bootstrap Select-->
    <script src="../../assets/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!--Magnific Popup-->
    <script src="../../assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--Owl Carousel-->
    <script src="../../assets/vendors/owl.carousel/owl.carousel.min.js"></script>
    <!--CounterUp-->
    <script src="../../assets/vendors/couterup/jquery.counterup.min.js"></script>
    <!--WayPoints-->
    <script src="../../assets/vendors/waypoint/waypoints.min.js"></script>
    <!--Isotope & ImagesLoaded-->
    <script src="../../assets/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="../../assets/vendors/isotope/isotope.min.js"></script>
    <!--Theme Script-->    
    <script src="../../assets/js/theme.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="../assetsAdmin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../assetsAdmin/plugins/jszip/jszip.min.js"></script>
    <script src="../assetsAdmin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../assetsAdmin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../assetsAdmin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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
</body>
</html>