<?php
  require('MHeader.php');
?>  
    <section class="row page-header">
        <div class="container">
            <h1>Perangkat Pemerintah Desa <?= $dataDesa[0]['namaDesa']?></h1>
        </div>
    </section>
    <section class="row team-content page-content">
        <div class="container">
            <div class="row team_members_row">
                <div class="col-sm-8">
                    <h3 class="team_page_title">Jajaran Perangkat Pemerintah Desa</h3>
                    <p class="team_page_para">Perangkat pemerintah desa merupakan warga yang terpilih untuk bisa mengelola dan menjalankan pemerintah desa, berikut nama nama perangkat desa</p>
                    <div class="row" height="1000px;">
                        <?php
                        foreach($dataPemerintahDesa as $dpd){
                        ?>
                        <div class="col-xs-3 col-sm-4 col-md-3 team_member">
                            <img src="../foto/<?=$dpd['gambar']?>" alt="" class="img-responsive" width="300px;" style="height: 80%;margin-bottom: 20px;">
                            <h4><?=$dpd['namaAnggota']?></h4>
                            <h6><?=$dpd['jabatan']?></h6>
                            <p></p>
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