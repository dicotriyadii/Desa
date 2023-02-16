<?php
  require('MHeader.php');
?>    
    <section >
        <div class="container">
            <h1>Profil Wilayah Desa</h1>
        </div>
    </section>
    
    <section class="row blog-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post post-type-image single-post row">
                        <div class="row featured-contents">
                            <a href="single.html"><img src="assets/images/post2/1.jpg" alt=""></a>
                        </div>
                        <div class="row article-body">
                            <h3 class="post-title"><a href="single.html">Desa <?= $dataDesa[0]['namaDesa']?></a></h3>
                            <div class="post-content row">
                                <p><?= $dataProfilWilayahDesa[0]['keteranganDesa'];?></p>
                            </div>  
                        </div>
                    </article>
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