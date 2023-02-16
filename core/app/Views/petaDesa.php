<?php
  require('MHeader.php');
?>       
    <section class="row page-header">
        <div class="container">
            <h1>Peta Desa <?= $dataDesa[0]['namaDesa'] ?></h1>
        </div>
    </section>
        <section class="row blog-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?= $dataDesa[0]['linkPetaDesa'] ?>
                </div>
                <div class="col-md-4 sidebar  post-sidebar">
                    <div class="row m0 widget widget-recent-posts">
                        <h4 class="widget-title">recent post</h4>
                        <?php
                        foreach($dataBerita as $db){
                        ?>
                        <div class="media recent-post">
                            <div class="media-left"><a href="single.html"><img src="../berita/<?= $db['gambarBerita']?>" alt="" style="width:100px;"></a></div>
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