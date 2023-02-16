<?php
  require('MHeader.php');
?>  
    <section class="row page-header">
        <div class="container">
            <h1>Galeri Foto</h1>
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
                            <img src="../galeri/<?= $dg['gambar'] ?>" alt="" class="img-responsive" style="height: 250px;width:280px; margin-bottom: 10px;">
                            <a href="../galeri/<?= $dg['gambar'] ?>" data-source="single-project.html" class="popup" data-title="<?= $dg['namaGambar'] ?>">
                                <i class="fa fa-search"></i>
                            </a>
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