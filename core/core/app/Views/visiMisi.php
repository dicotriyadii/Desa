<?php
  require('MHeader.php');
?>    
    
    <section class="row content_about page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 who_we_are">
                    <h3 class="team_page_title">Visi Dan Misi Desa <?= $dataDesa[0]['namaDesa']?></h3>
                    <p ><?=$dataVisiMisi[0]['keterangan']?></p>  
                </div>
                <div class="col-sm-6 history">
                    <div class="history_carousel">
                        <div class="item">
                            <h3 class="year">Visi Desa <?= $dataDesa[0]['namaDesa']?></h3>
                            <p><?=$dataVisiMisi[0]['visi']?></p>
                        </div>
                        <div class="item">
                            <h3 class="year">Misi <?= $dataDesa[0]['namaDesa']?></h3>
                            <p><?=$dataVisiMisi[0]['misi']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
<?php
  require('MFooter.php');
?>    