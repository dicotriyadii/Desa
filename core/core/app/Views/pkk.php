<?php
  require('MHeader.php');
?>  
   <section class="row page-header">
        <div class="container">
            <h1>Struktur Organisasi PKK</h1>
        </div>
    </section>
    <section class="row team-content page-content">
        <div class="container">
            <div class="row team_members_row">
                <div class="col-sm-8">
                    <h3 class="team_page_title">Jajaran Organisasi Pemberdayaan Kesejahteraan Keluarga</h3>
                    <p class="team_page_para">Organisasi Pemberdayaan Kesejahteraan Keluarga merupakan organisasi yang bertujuan untuk menjalankan / memperdayakan kesejahteraan keluarga yang ada di desa</p> 
                    <div class="row">
                        <?php
                        foreach($dataPKK as $dp){
                        ?>
                        <div class="col-xs-3 col-sm-4 col-md-3 team_member">
                            <img src="../foto/<?=$dp['gambar']?>" alt="" class="img-responsive">
                            <h4><?=$dp['namaAnggota']?></h4>
                            <h6><?=$dp['jabatan']?></h6>
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