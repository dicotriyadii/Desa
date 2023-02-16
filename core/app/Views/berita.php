<?php
  require('MHeader.php');
?>    
    <div class="container">
            <h1>Berita / Kegiatan</h1>
        </div>
        <div class="container">
        <a href="<?=base_url()?>/berita" class="btn-primary btn-outline">Semua</a>            
        <?php
        foreach($dataKategori as $k){
        ?>
        <a href="<?=base_url()?>/../index.php/beritaFilter/<?=$k['jenisKategori']?>" class="btn-primary btn-outline"><?=$k['jenisKategori']?></a>            
        <?php
        }
        ?>
            <div class="row event-listing-row">
               	<div class="col-sm-6 col-md-4 event-sizer"></div>
                <!--Event-->
                <?php
                foreach($dataBerita as $db){
                ?>
                <div class="col-sm-6 col-md-4 event-listing">
                    <div class="images_row row m0">
                        <a href="single-event.html"><img src="../berita/<?=$db['gambarBerita']?>" alt="" style="height:300px;"></a>
                    </div>
                    <div class="event_excepts row m0" style="height: 300px;">
                        <h4 class="event_title"><a href="single-event.html"><?=$db['judulBerita']?></a></h4>
                        <p><?=substr($db['keterangan'],0,100)?>...</p>
                        <a href="<?=base_url()?>/detailBerita/<?=$db['idBerita']?>" class="btn-primary btn-outline">Lihat Detail</a>
                    </div>
                    <div class="event-date row m0">
                        <h5><i class="fa fa-calendar"></i><?=$db['tanggalBerita']?></h5>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    
<?php
  require('MFooter.php');
?>    