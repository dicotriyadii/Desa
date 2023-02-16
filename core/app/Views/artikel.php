<?php
  require('MHeader.php');
?>    
    <section class="row page-header">
        <div class="container">
            <h1>Artikel</h1>
        </div>
    </section>
    
    <section class="row page-content">
        <div class="container">            
            <div class="row event-listing-row">
               	<div class="col-sm-6 col-md-4 event-sizer"></div>
                <!--Event-->
                <?php
                foreach($dataArtikel as $da){?>
                <div class="col-sm-6 col-md-4 event-listing">
                    <div class="images_row row m0" >
                        <a href="single-event.html"><img src="../artikel/<?=$da['gambarArtikel']?>" alt="" style="height:300px;"></a>
                    </div>
                    <div class="event_excepts row m0">
                        <h4 class="event_title"><a href="single-event.html"><?=$da['judulArtikel']?></a></h4>
                        <p><?= substr($da['keterangan'],100,100)?></p>
                        <a href="<?=base_url()?>/detailArtikel/<?=$da['idArtikel']?>" class="btn-primary btn-outline">Lihat Detail</a>
                    </div>
                    <div class="event-date row m0">
                        <h5><i class="fa fa-calendar"></i><?=$da['tanggalArtikel']?></h5>
                    </div>
                </div>
                <?php
                }
                ?>
        </div>
    </section>
    
<?php
  require('MFooter.php');
?>    