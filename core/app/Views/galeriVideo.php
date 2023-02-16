<?php
  require('MHeader.php');
?>  
    <section class="row page-header">
        <div class="container" style="margin-bottom: 10px;">
            <h1>Galeri Video</h1>
            <a href="<?=base_url()?>/galeri" class="btn-primary btn-outline">Foto</a>
            <a href="<?=base_url()?>/video" class="btn-primary btn-outline">Video</a>
        </div>
    </section>
    
    <section class="row gallery-content">
        <div class="container">
            <div class="row">
                <div class="gallery_container popup-gallery">
                    <div class="col-sm-4 col-md-3 grid-sizer"></div>
                    <!--Item-->
                    <?php
                    foreach($dataGaleri as $dg){
                    ?>
                    <div class="col-sm-4 col-md-3 gallery-item education">
                        <div class="image_row row">
                            <?= $dg['keterangan'] ?>
                        </div>
                        <div class="inner row" style="height: 100px; margin-bottom: 10px;">
                            <h5><?= $dg['namaGambar'] ?></h5>
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