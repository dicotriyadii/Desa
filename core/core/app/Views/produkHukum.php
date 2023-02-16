<?php
  require('MHeader.php');
?>    
    <section class="row page-header">
        <div class="container">
            <h1>Produk Hukum</h1>
        </div>
    </section>
    
    <section class="row blog-content page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php
                    foreach($dataProdukHukum as $dph){
                    ?>              
                    <article class="post post-type-image row">
                        <div class="row article-body">
                            <h3 class="post-title"><a href="single.html"><?=$dph['namaProdukHukum']?></a></h3>
                            <ul class="post-meta nav">
                                <li class="post-date"><i class="fa fa-calendar-o"></i> <a href="#"><?=$dph['tanggalUpload']?></a></li>       
                                <li class="posted-by"><i class="fa fa-user"></i>posted by: <a href="#"><?=$dph['authorProdukHukum']?></a></li>
                            </ul>
                            <div class="post-excerpt row">
                                <p><?=$dph['keterangan']?></p>
                            </div>
                            <a href="<?=base_url()?>/downloadProdukHukum/<?= $dph['idProdukHukum']?>" class="btn-primary btn-outline dark">download berkas</a>
                        </div>
                    </article>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-4 sidebar  post-sidebar">
                    <div class="row m0 widget widget-recent-posts">
                        <h4 class="widget-title">recent post</h4>
                        <?php
                        foreach($dataBerita as $db){
                        ?>
                        <div class="media recent-post">
                            <div class="media-left"><img src="../berita/<?= $db['gambarBerita']?>" alt="" style="width:100px;"></div>
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
    
    <?php
  require('MFooter.php');
?>    