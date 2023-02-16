<?php
  require('LHeader.php');
?>    
    <marquee width="100%" style="background-color:white; color:black;height:30px;font-size:15px; font-weight:bold;">
        <div>Pemberitahuan : 
        <?php
        foreach($dataPemberitahuan as $dp){?>
         <?= $dp['pemberitahuan']?> , 
        <?php 
        }
        ?>
        </div>
    </marquee>
    <!--Featured Slider-->
    <section class="row featured_events">
        <?php
        foreach($data as $d){
        ?>
        <div class="item" data-interval="10000">
            <img src="carousel/<?=$d['gambar']?>" alt="" style="width:100%; height:550px;">
            <div class="row caption m0">
               	<div class="caption_row">
					<div class="container">
						
					</div>
				</div>
            </div>
        </div>
        <?php
        }
        ?>
    </section>
    
    <section class="row blog-content page-content">
        <div class="container">
            <div class="row sectionTitle text-center">
                <h3>Berita dan Kegiatan</h3>
            </div>
            <div class="row">
                <div class="col-md-8">           

                <?php
                    foreach($dataBerita as $db){
                ?>
                <div class="col-sm-6 col-md-3 upcoming_events">
                    <div class="row event_cover_photo">
                        <img src="berita/<?=$db['gambarBerita']?>" alt="" class="img-responsive" style="height:100px; width:250px;">
                        <h6 class="event_time_loc">
                            <span class="by"><?=$db['authorBerita']?></span>
                            <span class="date_time"><?=$db['tanggalBerita']?></span>
                        </h6>
                    </div>
                    <h5 class="event_title"><a href="<?=base_url()?>/detailBerita/<?=$db['idBerita']?>"><?=$db['judulBerita']?></a></h5>
                </div>
                <?php
                }
                ?>
                </div>
                <div class="col-md-4 sidebar  post-sidebar" style="width:33%; border-radius:10px;">
                    <div class="row m0 widget widget-recent-posts">
                        <h3>Pengumuman</h3>
                        <hr style="border:1px solid gray;"> 
                        <div class="media recent-post">
                            <table border="0">
                                <?php
                                $no = 0;
                                foreach($dataPengumuman as $dp){
                                $no++;
                                ?>
                                <tr>      
                                    <td style="padding:5px;">
                                        <?=$no;?>.
                                    </td>
                                    <td style="padding:5px; font-size:12px;" >
                                        <?=substr($dp['pengumuman'],0,35);?>..
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td style="padding:5px; text-align:right; font-size:10px" colspan=3;>
                                        <a href="<?=base_url()?>/pengumuman">Lihat Selengkap nya</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row our_casuses">
        <div class="container">
            <div class="row sectionTitle text-center">
                <h3>Artikel Desa </h3>
            </div>
            <div class="row">
                <?php
                    foreach($dataArtikel as  $da){
                ?>
                <div class="latest-post col-md-3 col-sm-6">                    
                    <div class="row m0 featured_cont">
                        <img src="artikel/<?=$da['gambarArtikel']?>" alt="" class="img-responsive" style="height:200px;">
                    </div>
                    <h5 class="post-title"><a href="#"><?=$da['judulArtikel']?></a></h5>
                    <h6 class="post-meta"><a href="#"><?=$da['authorArtikel']?></a><a href="#"><?=$da['tanggalArtikel']?></a></h6>
                    <div class="post-excerpts row m0"><?=substr($da['keterangan'],0,200);?></div>
                    <a href="<?=base_url()?>/detailArtikel/<?=$da['idArtikel']?>" class="btn-primary btn-outline">Lihat Selengkapnya</a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section class="how_help row sectionGap" >
        <div class="container">
            <div class="row sectionTitle text-center">
                <h3>Data Statistik Desa</h3>
            </div>
            <div class="row help-process_row">
                <a href="<?=base_url();?>/dataWilayahAdministrasi">
                    <div class="col-sm-4 help-process">
                        <div class="icon_box row m0">
                            <img src="assets/images/iconAdministratif2.png" alt="">
                        </div>
                        <h5>Menurut Wilayah Administratif</h5>
                        <p>Data wilayah administratif merupakan data warga berdasarkan wilayah</p>
                    </div>
                </a>
                <a href="<?=base_url();?>/dataPekerjaan">
                    <div class="col-sm-4 help-process">
                        <div class="icon_box row m0">
                            <img src="assets/images/iconPekerjaan.png" alt="">
                        </div>
                        <h5>Menurut Pekerjaan</h5>
                        <p>Data pekerjaan merupakan data pekerjaan dari setiap warga desa</p>
                    </div>
                </a>
                <a href="<?=base_url();?>/dataJenisKelamin">
                    <div class="col-sm-4 help-process">
                        <div class="icon_box row m0">
                            <img src="assets/images/iconJenisKelamin.png" alt="">
                        </div>
                        <h5>Menurut Jenis Kelamin</h5>
                        <p>Data jenis kelamin merupakan data warga desa berdasarkan jenis kelamin</p>
                    </div>
                </a>
            </div>
            <div class="row help-process_row">
                <a href="<?=base_url();?>/dataPendidikanDitempuh">
                    <div class="col-sm-4 help-process">
                        <div class="icon_box row m0">
                            <img src="assets/images/iconAdministratif.png" alt="">
                        </div>
                        <h5>Menurut Pendidikan</h5>
                        <p>Data Pendidikan merupakan data warga berdasarkan jenjang pendidikan yang ditempuh</p>
                    </div>
                </a>
                <a href="<?=base_url();?>/dataAgama">
                    <div class="col-sm-4 help-process">
                        <div class="icon_box row m0">
                            <img src="assets/images/iconAgama.png" alt="">
                        </div>
                        <h5>Menurut Agama</h5>
                        <p>Data Agama merupakan data Agama yang di percaya / dianut oleh warga desa</p>
                    </div>
                </a>
                <a href="<?=base_url();?>/dataWargaNegara">
                    <div class="col-sm-4 help-process">
                        <div class="icon_box row m0">
                            <img src="assets/images/iconUmur.png" alt="">
                        </div>
                        <h5>Menurut Umur</h5>
                        <p>Data Umur merupakan data warga desa berdasarkan rentang umur yang sudah di tentukan</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
<?php
  require('LFooter.php');
?>
